<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $vehicle_id
     * @return \Illuminate\Http\Response
     */
    public function index($vehicle_id)
    {
        try {
            $vehicle = Vehicle::findOrFail($vehicle_id);
            
            $subcategories = $vehicle->subcategories()->with('category')->get();
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 400);
        }

        return response()->json($subcategories, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $vehicle_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $vehicle_id)
    {
        try {
            DB::beginTransaction();
            $vehicle = Vehicle::findOrFail($vehicle_id);

            $vehicle->subcategories()->attach($request->all());

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
            return response()->json([], 400);
        }

        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $vehicle_id
     * @param  int  $subcategory_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vehicle_id, $subcategory_id)
    {
        try {
            DB::beginTransaction();

            $vehicle = Vehicle::findOrFail($vehicle_id);

            $vehicle->subcategories()->detach($subcategory_id);

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return response()->json([], 400);
        }

        return response()->json([], 204);
    }
}
