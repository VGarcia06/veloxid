<?php

namespace App\Http\Controllers\Services\Allocations;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryEvidenceController extends Controller
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
            $allocations = Allocation::findOrFail($id)
                                            ->auxiliars()
                                            ->with('document_type')
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
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            Gallery::findOrFail($id)
                            ->services()
                            ->createMany([
                                [
                                    'nombre' => $request->input('nombre'),
                                    'numero' => $request->input('numero'),
                                    'document_type_id' => $request->input('document_type_id')
                                ]
                            ]);
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return response()->json([], 400);
        }

        return response()->json([],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function show(Allocation $allocation)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 400);
        }

        return response()->json([],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $allocation
     * @param  int  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $allocation, $auxiliar)
    {
        try {
            DB::beginTransaction();
            $auxiliar = Allocation::findOrFail($allocation)
                                        ->auxiliars()
                                        ->find($auxiliar);
            
            $auxiliar->nombre = $request->input('nombre');
            $auxiliar->numero = $request->input('numero');
            $auxiliar->document_type_id = $request->input('document_type_id');

            $auxiliar->save();
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return response()->json([], 400);
        }

        return response()->json([],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $allocation
     * @param  int  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function destroy($allocation, $auxiliar)
    {
        try {
            DB::beginTransaction();

            $auxiliar = Allocation::findOrFail($allocation)
                                        ->auxiliars()
                                        ->find($auxiliar);

            $auxiliar->delete();
            
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return response()->json([], 400);
        }

        return response()->json([],200);
    }
}
