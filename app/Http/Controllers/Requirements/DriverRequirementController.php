<?php

namespace App\Http\Controllers\Requirements;

use App\Http\Controllers\Controller;
use App\Models\DriverRequirement;
use Illuminate\Http\Request;

class DriverRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        try {
            $requirements = DriverRequirement::all();
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([

            ],400);
        }

        return response()->json([
            'message' => True,
            'Requirements' => $requirements
        ], 200);
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
     * @param  \App\Models\DriverRequirement  $driverRequirememt
     * @return \Illuminate\Http\Response
     */
    public function show(DriverRequirememt $driverRequirememt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DriverRequirement  $driverRequirememt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverRequirememt $driverRequirememt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DriverRequirement  $driverRequirememt
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverRequirememt $driverRequirememt)
    {
        //
    }
}
