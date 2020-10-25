<?php

namespace App\Http\Controllers;

use App\Models\Driver as ModelsDriver;
use App\Models\Person;
use App\User as Driver;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = new Driver; // Driver is a Eloquent object that makes references to User.

        $drivers = $driver
                        ->where('idUserType', 2) // The 2 is defined as Conductor/Driver
                        ->get();
                   
        return response()
                        ->json($drivers,200);         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        
        try {
            $driver = new Driver;

            /**
             * If you would like to begin a transaction manually and have 
             * complete control over rollbacks and commits, you may use the 
             * beginTransaction method on the DB facade:
             */
            DB::beginTransaction();

            /**
             * Validating unique email
             */
            $validator = Validator::make($request->all(), [
                'email' => 'unique:users'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'error' => 'email taken'
                ], 400);
            }

            /**
             * Laravel default user table instertion
             */ 
            $driver->name = $request->name;
            $driver->email = $request->email;
            $driver->password = Hash::make($request->password);
            $driver->idUserType = 2; // The 2 is defined as Conductor/Driver
            $driver->idStatus = 1; // Driver is always activated once is created

            $driver->save();

            /**
             * Person Table that contains personal data
             */
            $person = new Person;

            $person->nombre = $request->nombre;
            $person->apellidoPaterno = $request->apellidoPaterno;
            $person->apellidoMaterno = $request->apellidoMaterno;
            $person->telefono = $request->telefono;
            $person->direccion = $request->direccion;
            $person->correo = $request->correo;
            $person->imagen = $request->imagen;
            $person->numero = $request->numero; // ID CARD number
            $person->idDocumentType = $request->idDocumentType; // ID CARD type

            $driver->person()->save($person); // insert personal data on Person for a User

            /**
             * Driver Table that contains driver data
             */
            $driverdata = new ModelsDriver;
            
            $driverdata->licenciaConducir = $request->licenciaConducir;
            $driverdata->constanciaEstadoSalud = $request->constanciaEstadoSalud;
            $driverdata->cuentaBancaria = $request->cuentaBancaria;
            $driverdata->banco = $request->banco;

            $driver->driver()->save($driverdata); // insert driver data on Driver for a User
            
            /**
             * Lastly, you can commit a transaction via the commit method:
             */
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;

            /**
             * You can rollback the transaction via the rollBack method:
             */
            DB::rollBack();
            return response()->json([
                'error' => 'Something was wrong'
            ], 400);
        }

        return response()
                    ->json(['state' => True], 201);        
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);

        $person = $driver->person()->first();

        $driverdata = $driver->driver()->first();

        return response()->json([
            'name' => $driver->name,
            'email' => $driver->email, 
            'password' => $driver->password, 
            'nombre' => $person->nombre, 
            'apellidoPaterno' => $person->apellidoPaterno, 
            'apellidoMaterno' => $person->apellidoMaterno, 
            'telefono' => $person->apellidoPaterno, 
            'direccion' => $person->direccion, 
            'correo' => $person->correo, 
            'imagen' => $person->imagen, 
            'numero' => $person->numero,
            'idDocumentType' => $person->idDocumentType,
            'licenciaConducir' => $driverdata->licenciaConducir,
            'constanciaEstadoSalud' => $driverdata->constanciaEstadoSalud,
            'cuentaBancaria' => $driverdata->cuentaBancaria,
            'banco' => $driverdata->banco
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request...
        
        try {
            $driver = Driver::find($id);

            /**
             * If you would like to begin a transaction manually and have 
             * complete control over rollbacks and commits, you may use the 
             * beginTransaction method on the DB facade:
             */
            DB::beginTransaction();

            /**
             * Laravel default user table instertion
             */ 
            $driver->name = $request->name;
            $driver->email = $request->email;
            $driver->password = Hash::make($request->password);
            $driver->idUserType = 2; // The 2 is defined as Conductor/Driver
            $driver->idStatus = 1; // Driver is always activated once is created

            $driver->save();

            /**
             * Person Table that contains personal data
             */
            $person = $driver->person()->first(); // Getting the Person Object from driver/user

            $person->nombre = $request->nombre;
            $person->apellidoPaterno = $request->apellidoPaterno;
            $person->apellidoMaterno = $request->apellidoMaterno;
            $person->telefono = $request->telefono;
            $person->direccion = $request->direccion;
            $person->correo = $request->correo;
            $person->imagen = $request->imagen;
            $person->numero = $request->numero; // ID CARD number
            $person->idDocumentType = $request->idDocumentType; // ID CARD type

            $person->save();

            /**
             * Driver Table that contains driver data
             */
            $driverdata = $driver->driver()->first();

            $driverdata->licenciaConducir = $request->licenciaConducir;
            $driverdata->constanciaEstadoSalud = $request->constanciaEstadoSalud;
            $driverdata->cuentaBancaria = $request->cuentaBancaria;
            $driverdata->banco = $request->banco;

            $driverdata->save(); // update   driver data on Driver for a User
            
            /**
             * Lastly, you can commit a transaction via the commit method:
             */
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;

            /**
             * You can rollback the transaction via the rollBack method:
             */
            DB::rollBack();
            return response()->json([
                'error' => 'Something was wrong'
            ], 400);
        }
        
        return response()
                    ->json($driver, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $driver = Driver::find($id);

            $driver->idStatus = 2; // 2 references to Inactive mode
        } catch (\Throwable $th) {
            //throw $th;

            return response()
                    ->json([],400);
        }
        

        return response()
                    ->json([],204);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEvaluated()
    {
        try {
            $drivers = Driver::has('driver')
                                ->get()
                                ->load(
                                    'driver.revisions.status',
                                    'driver.vehicles.revisions.status'
                                );

            $suitable = $drivers->reject(function ($driver) {
                return      $driver->driver()
                                ->first()
                                ->vehicles()
                                // 
                                ->get()
                                ->reject(function ($vehicle) {
                                    return $vehicle->first()
                                                    ->revisions()
                                                    ->orderBy('created_at', 'desc')
                                                    ->first()
                                                    ['requirement_status_id'] == 2;
                                })
                                ->first() == null
                                //
                                //->revisions()
                                //->orderBy('created_at', 'desc')
                                //->first()
                                //['requirement_status_id'] == 2

                                OR

                            $driver->driver()
                                ->first()
                                ->revisions()
                                ->orderBy('created_at', 'desc')
                                ->first()
                                ['requirement_status_id'] == 2;
            });

            /*
            $unsuitable = $drivers->reject(function ($driver) {
                return $driver->driver()
                                ->first()
                                ->revisions()
                                ->orderBy('created_at', 'desc')
                                ->first()
                                ['requirement_status_id'] == 1;
            });            
            */

            $unsuitable = $drivers->diff($suitable);
            
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([
                'message' => 'Something was wrong'
            ], 400);
        }

        return response()
                    ->json(['message' => True,
                            'suitable' => $suitable->load(
                                'driver.revisions.status',
                                'driver.vehicles.revisions.status'
                            ),
                            'unsuitable' => $unsuitable->load(
                                'driver.revisions.status',
                                'driver.vehicles.revisions.status'
                            )
                        ], 200);        
    }
}
