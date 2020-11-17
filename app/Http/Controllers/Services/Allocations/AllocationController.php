<?php

namespace App\Http\Controllers\Services\Allocations;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $allocations = Auth::user()
                                    ->driver()
                                    ->first()
                                    ->allocations()
                                    ->with('service')
                                    ->paginate(12);
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 400);
        }

        return response()->json($allocations, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // creating allocation 
            Allocation::create([
                'driver_id' => $request->input('driver_id'),
                'service_id' => $request->input('service_id'),
                'estado' => 0 // not accepted yet
            ]);

            // changing service state to the service
            $service = Service::findOrFail( (int) $request->input('service_id'));

            $service->service_state_id = 2; // waiting for decision to be accepted or not

            $service->save();
            
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
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function show(Allocation $allocation)
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
        try {
            DB::beginTransaction();

            // changing service state to the service
            $allocation = Allocation::findOrFail( (int) $id);

            $allocation->estado = 1; // accepted

            $allocation->save();

            $service = $allocation->service()->first();

            $service->service_state_id = 3; // in progress

            $service->save();
            
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
            return response()->json([], 400);
        }

        return response()->json([], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            // changing service state to the service
            $allocation = Allocation::findOrFail( (int) $id);

            $service = $allocation->service()->first();

            $service->service_state_id = 2; // pending

            $service->save();

            $allocation->delete();
            
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
            return response()->json([], 400);
        }

        return response()->json([], 200);
    }
}