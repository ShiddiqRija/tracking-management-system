<?php

namespace App\Http\Controllers;

use App\Events\DeviceUpdate;
use App\Http\Requests\PositionRequest;
use App\Models\Device;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.tracking.index');
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
    public function store(Position $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
    }

    public function storePosition(Request $request)
    {
        //Check Device Id
        $device = Device::where('device_id', $request->device_id)->first();
        if ($device) {
            try {
                $position = Position::create($request->all());

                $device = Device::where('device_id', $position->device_id)->first();

                $device->update([
                    'position_id' => $position->id,
                    'last_update' => round(microtime(true) * 1000)
                ]);

                broadcast(new DeviceUpdate());

                return $this->sendResponse($position, 'Position added successfully');
            } catch (\Exception $err) {
                return $this->sendError($err, $err->getMessage(), 400);
            }
        }
    }

    public function deviceInfo()
    {
        $device = Device::all();

        foreach ($device as $d) {
            $d->location = Position::find($d->position_id);
        }

        return $device;
    }
}
