<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $service_id
     * @return \Illuminate\Http\Response
     */
    public function index($service_id)
    {
        try {
            $galleries_group_by_state = Service::findOrFail($service_id)
                                                        ->galleries()
                                                        ->get();
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 400);
        }

        return response()->json($galleries_group_by_state,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $service_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $service_id)
    {
        try {
            DB::beginTransaction();
            $service = Service::findOrFail($service_id);
            $service->service_state_id= 4;

            $path_imagen = "";
            if ($request->hasFile('imagen')) {
                $path_imagen = Storage::disk('public')->put('services', $request->file('imagen'));
            }

            $services = new Gallery;

            $services->imagen= $path_imagen;
            $services->service_state_id = 4;
            $services->service_id = $service_id;

            $services->save(); 

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
     * @param  int  $service_id
     * @param  int  $gallery_id
     * @return \Illuminate\Http\Response
     */
    public function show($service_id, $gallery_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $service_id
     * @param  int  $gallery_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($service_id, $gallery_id)
    {
        try {
            Service::findOrFail($service_id)
                            ->galleries()
                            ->findOrFail($gallery_id)
                            ->delete();
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 400);
        }

        return response()->json([],204);
    }
}
