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
        $vehicle = Vehicle::all();

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