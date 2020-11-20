<?php

namespace App\Http\Controllers;

use App\User as Driver;
use App\Models\DriverRequirement;
use App\Models\DriverRevision;
use App\Models\Revision;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try {

            $driver = Driver::find($id);

            $revisions = $driver->driver()
                                    ->first()
                                    ->revisions()
                                    ->latest()
                                    ->with('status')
                                    ->get();
                                    
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([
                'message' => 'Something was wrong'
            ],400);
        }

        return response()->json([
            'message' => True,
            'revisions' => $revisions
        ],200);
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
            $driver = Driver::findOrFail($id);

            $driver_requirements = DriverRequirement::all();
            
            $suitable = 1;

            $id_requirements = [];

            foreach ($request->evals as $eval) {
                $id_requirements[] = $eval['idRequirement'];
            }

            if ($driver_requirements->except($id_requirements)->count()) {
                $suitable = 2;
            }

            $revision = $driver->driver()
                                ->first()
                                ->revisions()
                                ->createMany([
                                    [
                                        'observacion' => $request->observacion,
                                        'requirement_status_id' => $suitable
                                    ]
                                ])
                                ->first();
            foreach ($driver_requirements as $driver_requirement) {
                if (in_array($driver_requirement['id'], $id_requirements)) {
                    $revision->requirements()
                        ->attach($driver_requirement['id'], ['valor' => 1]);
                }else {
                    $revision->requirements()
                        ->attach($driver_requirement['id'], ['valor' => 0]);
                }
                
            }

            /**
             * Storing the driver revision in a general revision of the day.
             */
            $today = Carbon::today('America/Lima');

            $last_general_revision = $driver->driver()->first()->general_revisions()->latest()->first();
            
            // if a last general revision exists
            if ($last_general_revision != null) {
                // if the last revision is in date (today)
                if ($last_general_revision->created_at->greaterThanOrEqualTo($today)) {
                    # adding the driver revision to the existing general revision
                    $revision->general_revisions()->attach($last_general_revision->id);
                } else {
                    # creating a new general revision for the driver
                    $new_general_revision = $driver->driver()->first()->general_revisions()->saveMany([
                                                new Revision()
                                            ])[0];
                    $revision->general_revisions()->attach($new_general_revision->id);
                }
            } else {
                # creating the first general revision for the driver
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
     * @param  int  $driver
     * @param  int  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show($driver, $evaluation)
    {
        try {

            $driver = Driver::findOrFail($driver);

            $revision = $driver->driver()
                                    ->first()
                                    ->revisions()
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        try {

            $revisions = DriverRevision::orderBy('id', 'desc')
                                            ->with('driver.user.person', 'status')
                                            ->paginate(12);
                                    
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([
                'message' => 'Something was wrong'
            ],400);
        }

        return response()->json($revisions,200);
    }
}
