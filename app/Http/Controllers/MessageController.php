<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Device;
use App\Models\Message;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.message.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $devices = Device::all();

        return view('pages.message.create', compact('devices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        try {
            $req = $request->validated();

            $req['unique_id']   = Device::where('device_id', $req['device_id'])->first()->unique_id;
            $req['send_time']   = round(microtime(true) * 1000);
            $req['created_by']  = 1; //value for temp when auth created value by user id

            $res = $this->sendMessage($req);

            $status = json_decode($res->getStatusCode());

            if ($status == 200 || $status == 202) {
                Message::create($req);

                return redirect()->route('messages.index')->with('success', 'Device Added Succesfully');
            }
        } catch (\Exception $err) {
            return back()->withInput()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }

    public function sendMessage($data)
    {
        $client = new Client();

        $res = $client->request('POST', env('GPS_SERVER') . '/api/commands/send', [
            'auth' => [
                'admin@gmail.com', 'Deployment123!'
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode([
                'deviceId' => $data['device_id'],
                'description' => 'Message from TMS',
                'type' => 'custom',
                'attributes' => [
                    'data' => 'mg=' . $data["message"]
                ]
            ])
        ]);

        return $res;
    }

    public function messageLists()
    {
        $messages = Message::query()->get();

        return DataTables::of($messages)
            ->addIndexColumn()
            ->addColumn('deviceName', function($data) {
                $device = Device::where('id', $data->device_id)->first();
                return $device->name;
            })
            ->rawColumns(['deviceName'])
            ->make(true);
    }
}
