<?php

namespace App\Http\Controllers\Services\Allocations;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllocationVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($allocation_id)
    {
        try {
            $allocation = Allocation::findOrFail($allocation_id);

            $vehicles = $allocation->vehicles()->get();
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 400);
        }

        return response()->json($vehicles, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $allocation_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $allocation_id)
    {
        try {
            DB::beginTransaction();

            $allocation = Allocation::findOrFail($allocation_id);

            $allocation->vehicles()->attach($request->input('vehicle_id'));
            
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
     * @param  int  $allocation_id
     * @param  int  $vehicle_id 
     * @return \Illuminate\Http\Response
     */
    public function destroy($allocation_id, $vehicle_id)
    {
        try {
            DB::beginTransaction();

            $allocation = Allocation::findOrFail($allocation_id);

            $allocation->vehicles()->detach($vehicle_id);

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
            return response()->json([], 400);
        }

        return response()->json([], 204);
    }
}
