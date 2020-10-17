<?php

namespace App\Http\Controllers;

use App\Models\User as Driver;
use Illuminate\Http\Request;

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

        return $driver
                    ->where('idUserType', 2) // The 2 is defined as Conductor/Driver
                    ->get()
                    ->toJson();         
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
            $person = new App\Models\Person;

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
             * Lastly, you can commit a transaction via the commit method:
             */
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;

            /**
             * You can rollback the transaction via the rollBack method:
             */
            DB::rollBack();
        }

        return $driver
                    ->toJson();        
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);

        return $driver
                    ->toJson();
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
             * Lastly, you can commit a transaction via the commit method:
             */
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;

            /**
             * You can rollback the transaction via the rollBack method:
             */
            DB::rollBack();
        }

        return $driver
                    ->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);

        $driver->idStatus = 2; // 2 references to Inactive mode

        return $driver
                    ->toJson();
    }
}
