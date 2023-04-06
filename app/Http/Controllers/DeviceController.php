<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceRequest;
use App\Models\Device;
use App\Models\Position;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.device.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.device.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeviceRequest $request)
    {
        try {
            $req = $request->validated();

            $req['status'] = 'offline';
            $req['created_by'] = auth()->user()->id;

            $res = $this->storeServer($req);

            $req['device_id'] = json_decode($res->getBody()->getContents())->id;
            $status = json_decode($res->getStatusCode());

            if ($status == 200) {
                Device::create($req);

                return redirect()->route('devices.index')->with('success', 'Device Added Succesfully');
            }
        } catch (\Exception $err) {
            return back()->withInput()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        return view('pages.device.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        try {
            $res = $this->updateServer($request, $device);

            $status = json_decode($res->getStatusCode());

            if ($status == 200) {
                $device->update($request->all());

                return redirect()->route('devices.index')->with('success', 'Device updated successfully');
            }
        } catch (\Exception $err) {
            return back()->with('error', 'Failed to update')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        try {
            $res = $this->destroyServer($device->device_id);

            $status = json_decode($res->getStatusCode());

            if ($status == 204) {
                $device->delete();

                return redirect()->route('devices.index')->with('success', 'Device deleted successfully');
            }
        } catch (\Exception $err) {
            return back()->with('error', 'Failed to delete')->withInput();
        }
    }

    public function storeServer($data)
    {
        $client = new Client();

        $res = $client->request('POST',  env('GPS_SERVER') . '/api/devices', [
            'auth' => [
                'admin@gmail.com', 'Deployment123!'
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode([
                'name' => $data['name'],
                'uniqueId' => $data['unique_id'],
                'status' => $data['status'],
                'groupId' => $data['group_id'],
                'phone' => $data['phone'],
                'contact' => $data['contact'],
            ])
        ]);

        return $res;
    }

    public function updateServer($request, $device)
    {
        $client = new Client();

        $res = $client->request('PUT', env('GPS_SERVER') . "/api/devices/$device->device_id", [
            'auth' => [
                'admin@gmail.com', 'Deployment123!'
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode([
                'id' => $device->device_id,
                'name' => $request->name,
                'uniqueId' => $request->unique_id,
                'groupId' => $request->groupId,
                'phone' => $request->phone,
                'contact' => $request->contact,
            ])
        ]);

        return $res;
    }

    public function destroyServer($id)
    {
        $client = new Client();

        $res = $client->request('DELETE', env('GPS_SERVER') . "/api/devices/$id", [
            'auth' => [
                'admin@gmail.com', 'Deployment123!'
            ]
        ]);

        return $res;
    }

    public function deviceLists()
    {
        $devices = Device::query()->get();

        return DataTables::of($devices)
            ->addIndexColumn()
            ->addColumn('heartRate', function ($data) {
                $position = Position::where('id', $data->position_id)->first();
                if ($position != null) {
                    $attributes = json_decode($position->attributes);
                    $heartRate = $attributes->heartRate;
                    return $heartRate;
                } else {
                    return 0;
                }
            })
            ->addColumn('weatherTemp', function ($data) {
                $position = Position::where('id', $data->position_id)->first();
                if ($position != null) {
                    $attributes = json_decode($position->attributes);
                    $weatherTemp = $attributes->weatherTemp;
                    return $weatherTemp;
                } else {
                    return 0;
                }
            })
            ->rawColumns(['heartRate', 'weatherTemp'])
            ->make(true);
    }

    public function updateDevice(Request $request)
    {
        $device = Device::where('device_id', $request->id)->first();

        try {
            $device->update([
                'status' => $request->status,
            ]);

            return $this->sendResponse($device, 'Device updated successfully');
        } catch (\Exception $err) {
            return $this->sendError($err, $err->getMessage(), 400);
        }
    }
}
