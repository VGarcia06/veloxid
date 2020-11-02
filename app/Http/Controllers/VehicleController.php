<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    
    public function index()
    {
        $vehicle = Vehicle::select(vehicles.id, `placa`, `capacidadCarga`, `imagen`, vehicletype.nombre,users.name, `updated_at`)
        ->join('vehicletype', 'vehicles.idVehicleType', '=', 'vehicletype.id')
        ->join('drivers', 'vehicles.idDriver', '=', 'drivers.id')
        ->join('users', 'drivers.id', '=', 'users.id')
        ->paginate(9);
        
        return $vehicle;
    }

    function show($id)
    {
        
    }

    public function create()
    {
       
    }

    // store...

    public function edit($id)
    {
        
    }
}