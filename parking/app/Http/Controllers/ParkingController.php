<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkingRequest;
use App\Http\Resources\ParkinResource;
use App\Models\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parkings = Parking::all();
        return new ParkinResource($parkings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParkingRequest $request)
    {
        $data = $request->validated();
        $parking = Parking::create($data);
        return new ParkinResource($parking);
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
