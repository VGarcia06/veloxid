<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleRequirement;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VehicleEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $vehicle = Vehicle::find($id);

            $vehicle_requirements = VehicleRequirement::all();
            
            $suitable = 1;

            $id_requirements = [];

            foreach ($request->evals as $eval) {
                $id_requirements[] = $eval['idRequirement'];
            }

            if ($vehicle_requirements->except($id_requirements)->count()) {
                $suitable = 2;
            }
            
            $revision = $vehicle->revisions()
                                ->createMany([
                                    [
                                        'observacion' => $request->observacion,
                                        'requirement_status_id' => $suitable
                                    ]
                                ])
                                ->first();
            foreach ($vehicle_requirements as $vehicle_requirement) {
                if (in_array($vehicle_requirement['id'], $id_requirements)) {
                    $revision->requirements()
                        ->attach($vehicle_requirement['id'], ['valor' => 1]);
                }else {
                    $revision->requirements()
                        ->attach($vehicle_requirement['id'], ['valor' => 0]);
                }
                
            }

            // get driver
            $driver = $vehicle->driver()->first()->user()->first();

            /**
             * Storing the driver revision in a general revision of the day.
             */
            $today = Carbon::today('America/Lima');

            $last_general_revision = $driver->driver()->first()->general_revisions()->latest()->first();
            
            // if a last general revision exists
            if ($last_general_revision != null) {
                // if the last revision is in date (today in America/Lima)
                if ($last_general_revision->created_at->greaterThanOrEqualTo($today)) {
                    # adding the vehicle revision to the existing general revision
                    $revision->general_revisions()->attach($last_general_revision->id);
                } else {
                    # creating a new general revision for the vehicle
                    $new_general_revision = $driver->driver()->first()->general_revisions()->saveMany([
                                                new Revision()
                                            ])[0];
                    $revision->general_revisions()->attach($new_general_revision->id);
                }
            } else {
                # creating the first general revision for the vehicle
                $first_general_revision = $driver->driver()->first()->general_revisions()->saveMany([
                                                new Revision()
                                            ])[0];
                $revision->general_revisions()->attach($first_general_revision->id);
            }

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
            return response()->json([
                'message' => 'Something was wrong'
            ], 400);
        }

        return response()
                    ->json(['message' => True], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $evaluation
     * @param  int  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($vehicle, $evaluation)
    {
        try {

            $vehicle = Vehicle::findOrFail($vehicle);

            $revision = $vehicle->revisions()
                                    ->findOrFail($evaluation)
                                    ->load('requirements', 'status');
                                    
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([
                'message' => 'Something was wrong'
            ],400);
        }

        return response()->json([
            'message' => True,
            'revision' => $revision
        ],200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
