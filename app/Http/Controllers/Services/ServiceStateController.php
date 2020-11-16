<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\States\ServiceState;
use Illuminate\Http\Request;

class ServiceStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $states = ServiceState::all();

        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 400);
        }
        
        return response()->json($states, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\States\ServiceState  $serviceState
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceState $serviceState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\States\ServiceState  $serviceState
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceState $serviceState)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\States\ServiceState  $serviceState
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceState $serviceState)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\States\ServiceState  $serviceState
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceState $serviceState)
    {
        //
    }
}
