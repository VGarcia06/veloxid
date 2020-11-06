<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    
    public function index($id)
    {
        try {
            $vehicles = User::findOrFail($id)
                                ->driver()
                                ->first()
                                ->vehicles()
                                ->with('type')
                                ->paginate(12);

            foreach ($vehicles->items() as $vehicle) {
                if (Storage::disk('public')->exists($vehicle->imagen)) {
                      $vehicle->imagen = Storage::url($vehicle->imagen);
                }    
            }

        } catch (\Throwable $th) {
            throw $th;

            return response()->json([

            ],400);
        }
        

        return response()->json([
            'message' => True,
            'vehicles' => $vehicles
        ], 200);

    }

    public function show($id)
    {
        try {
            $vehicle = Vehicle::findOrFail($id);

        } catch (\Throwable $th) {
            return response()->json([

            ],400);
        }

        return response()->json([
            'message' => True,
            'vehicle' => $vehicle
        ], 200);
    }

    public function store(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $user = User::find($id);

            $path_image = "";
            if ($request->hasFile('imagen')) {
                $path_image = Storage::disk('public')->put('vehicles', $request->file('imagen'));
            }

            $user->driver()
                    ->first()
                    ->vehicles()
                    ->createMany([
                        [
                            'placa' => $request->placa,
                            'capacidadCarga' => $request->capacidadCarga,
                            'imagen' => $path_image,
                            'idVehicleType' => $request->idVehicleType,
                        ]
                    ]);

            DB::commit();

        } catch (\Throwable $th) {
            //throw $th;

            DB::rollBack();
            return response()->json([
                'message' => False
            ], 400);
        }
       
        return response()->json([
            'message' => True,
        ], 201);
    }

    // store...

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $vehicle = Vehicle::findOrFail($id);

            $path_image = "";
            if ($request->hasFile('imagen')) {
                Storage::delete($vehicle->imagen);
                $path_image = Storage::disk('public')->put('vehicles', $request->file('imagen'));
            }

            $vehicle->placa = $request->placa;
            $vehicle->capacidadCarga = $request->capacidadCarga;
            $vehicle->imagen = $path_image;
            $vehicle->idVehicleType = $request->idVehicleType;

            $vehicle->save();

            DB::commit();

        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
            return response()->json([
                'message' => False
            ], 400);
        }
       
        return response()->json([
            'message' => True,
        ], 201);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $vehicle = Vehicle::findOrFail($id);

            $vehicle->delete();

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
            return response()->json([
                'message' => False
            ], 400);
        }

        return response()->json([
            'message' => True,
        ], 204);
    }
}