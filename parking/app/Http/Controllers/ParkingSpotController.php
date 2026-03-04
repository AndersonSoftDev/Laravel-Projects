<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkingRequest;
use App\Http\Requests\ParkingSpotRequest;
use App\Models\parking_spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParkingSpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParkingSpotRequest $request)
    {
        $parkingSpot = DB::transaction(function () use($request) {
            $data = $request->validated();

            return parking_spot::create($data);
        });

        return response()->json([
                'message' => 'Parking spot added with sucess!',
                'data' => $parkingSpot
            ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
