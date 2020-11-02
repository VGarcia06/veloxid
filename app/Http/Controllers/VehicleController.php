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

        $vehicles = User::find($id)
                                ->first()
                                ->driver()
                                ->first()
                                ->vehicles()
                                ->paginate(8);

        return response()->json([
            'message' => True,
            'vehicles' => $vehicles
        ], 200);

    }

    function show($id)
    {
        
    }

    public function store(Request $request, $id)
    {

        try {
            $user = User::find($id);

            if ($request->hasFile('imagen')) {
                $request->imagen = Storage::put('vehicles', $request->file('imagen'), 'public');
            }

            $user->driver()
                    ->first()
                    ->vehicles()
                    ->createMany([
                        [
                            'placa' => $request->placa,
                            'capacidadCarga' => $request->capacidadCarga,
                            'imagen' => $request->imagen,
                            'idVehicleType' => $request->idVehicleType,
                        ]
                    ]);

        } catch (\Throwable $th) {
            //throw $th;

            return response()->json([
                'message' => False
            ], 400);
        }
       
        return response()->json([
            'message' => True,
        ], 201);
    }

    // store...

    public function update($id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}