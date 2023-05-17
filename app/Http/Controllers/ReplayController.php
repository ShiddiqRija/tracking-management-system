<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReplayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devices = Device::all();

        return view('pages.replay.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->period == null) {
            $deviceData = Position::where('device_id', $request->device)->whereBetween('device_time', [$request->from, $request->to])->get();

            foreach ($deviceData as $d) {
                $data[] = [
                    'device_id' => $d->device_id,
                    'latitude'  => $d->latitude,
                    'longitude' => $d->longitude
                ];
            }

            return $this->sendResponse($data, 'GET Position data by Custom successfully');
        }

        if ($request->period != null) {
            date_default_timezone_set('Asia/Jakarta');
            $currentMillis = round(microtime(true) * 1000);
            $currentTime = Carbon::createFromTimestampMs($currentMillis);
            $startOfDay = $currentTime->startOfDay()->timestamp * 1000;
            $endOfDay = $currentTime->endOfDay()->timestamp * 1000;

            $deviceData = Position::where('device_id', $request->device)->whereBetween('device_time', [$startOfDay, $endOfDay])->get();

            if ($deviceData->isNotEmpty()) {
                foreach ($deviceData as $d) {
                    $data[] = [
                        'device_id' => $d->device_id,
                        'latitude'  => $d->latitude,
                        'longitude' => $d->longitude
                    ];
                }
                
                return $this->sendResponse($data, 'GET Position data by Today successfully');
            } else {
                return $this->sendResponse([], 'No Data');
            }
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
