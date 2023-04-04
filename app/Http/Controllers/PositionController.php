<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
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

    public function positionDevice()
    {
        $data = [
            [
                "id" => 1,
                "name" => "DDX04-Watch",
                "imei" => "863921037245134",
                "status" => "offline",
                "phone" => null,
                "contact" => null,
                "positionId" => 7,
                "createdBy" => 1,
                "created_at" => "2023-03-27T03:48:51.000000Z",
                "updated_at" => "2023-03-30T04:27:32.000000Z",
                "attributes" => [
                    "charge" => 0,
                    "batteryLevel" => 85,
                    "temperature" => "36.0",
                    "heartRate" => "65.5",
                    "lat" => "1.11348661",
                    "long" => "104.06621810"
                ]
            ],
            [
                "id" => 2,
                "name" => "DDX04-Broken",
                "imei" => "863921037245136",
                "status" => "offline",
                "phone" => null,
                "contact" => null,
                "positionId" => 7,
                "createdBy" => 1,
                "created_at" => "2023-03-27T03:48:51.000000Z",
                "updated_at" => "2023-03-30T04:27:32.000000Z",
                "attributes" => [
                    "charge" => 0,
                    "batteryLevel" => 25,
                    "temperature" => "36.2",
                    "heartRate" => "65.0",
                    "lat" => "1.11358661",
                    "long" => "104.07611810"
                ]
            ]
        ];

        return $data;
    }
}
