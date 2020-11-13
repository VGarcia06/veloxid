<?php

namespace App\Http\Controllers;

use App\User as Driver;
use App\Models\DriverRequirement;
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
                                    ->with('requirements')
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

            if ($driver_requirements->except($id_requirements) !== null) {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
