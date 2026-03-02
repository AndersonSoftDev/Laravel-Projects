<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequisitionRequest;
use App\Http\Resources\RequisitionResource;
use App\Models\Requisition;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequisitionRequest $request)
    {
        $requisition = DB::transaction(function () use($request){
            $data = $request->validated();
            $requisition = new Requisition($data);

            $requisition->load('product');

            $requisition->calculateTotalPrice();
            $requisition->reduceQuantityBasedOnOrder();

            $requisition->save();

            return $requisition;


        });

       return new RequisitionResource($requisition->load('product'));
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
