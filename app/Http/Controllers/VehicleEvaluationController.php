<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
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

            $suitable = 1;
            foreach ($request->evals as $eval) {
                if (!$eval['valor']) {
                    $suitable = 2;
                }
            }

            $revision = $vehicle->revisions()
                                ->createMany([
                                    [
                                        'observacion' => $request->observacion,
                                        'requirement_status_id' => $suitable
                                    ]
                                ])
                                ->first();
            foreach ($request->evals as $eval) {
                $revision->requirements()
                        ->attach($eval['idRequirement'], ['valor' => $eval['valor']]);
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
