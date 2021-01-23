<?php

namespace App\Http\Controllers;

use App\Models\Driver as ModelsDriver;
use App\Models\Person;
use App\User as Driver;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        $drivers = Driver::where('idUserType', 2) // The 2 is defined as Conductor/Driver
                        ->with('person', 'driver', 'status')
                        ->paginate(12);
                        
        $active = Driver::where('idUserType', 2)
                                ->get()
                                ->count();
        $inactive = Driver::onlyTrashed()
                                ->where('idUserType', 2)
                                ->get()
                                ->count();

        foreach ($drivers->items() as $driver) {
            if (Storage::disk('public')->exists($driver->person->imagen)) {
                $driver->person->imagen = Storage::url($driver->person->imagen);
            }
            if (Storage::disk('public')->exists($driver->driver->constanciaEstadoSalud)) {
                $driver->driver->constanciaEstadoSalud = Storage::url($driver->driver->constanciaEstadoSalud);
            }
        }

        return response()
                        ->json([
                            'active' => $active,
                            'inactive' => $inactive,
                            'drivers' => $drivers
                        ],200);         
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

            // testing Driver 's image
            $path_imagen = "";
            if ($request->hasFile('imagen')) {
                $path_imagen = Storage::disk('public')->put('drivers', $request->file('imagen'));
            }

            /**
             * Person Table that contains personal data
             */
            $person = new Person;

            $person->nombre = $request->nombre;
            $person->apellidoPaterno = $request->apellidoPaterno;
            $person->apellidoMaterno = $request->apellidoMaterno;
            $person->telefono = $request->telefono;
            $person->direccion = $request->direccion;
            $person->imagen = $path_imagen;
            $person->numero = $request->numero; // ID CARD number
            $person->idDocumentType = $request->idDocumentType; // ID CARD type

            $driver->person()->save($person); // insert personal data on Person for a User

            /**
             * Driver Table that contains driver data
             */
            $driverdata = new ModelsDriver;

            // Testing Health Status Document
            $path_estado_salud = "";
            if ($request->hasFile('constanciaEstadoSalud')) {
                $path_estado_salud = Storage::disk('public')->put('drivers', $request->file('constanciaEstadoSalud'));
            }
            
            $driverdata->licenciaConducir = $request->licenciaConducir;
            $driverdata->constanciaEstadoSalud = $path_estado_salud;
            $driverdata->cuentaBancaria = $request->cuentaBancaria;
            $driverdata->banco = $request->banco;

            $driver->driver()->save($driverdata); // insert driver data on Driver for a User
            
            /**
             * Lastly, you can commit a transaction via the commit method:
             */
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

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
        try {
            $driver = Driver::findOrFail($id)
                                ->load('person.documentType', 'driver');

            if (Storage::disk('public')->exists($driver->person->imagen)) {
                $driver->person->imagen = Storage::url($driver->person->imagen);
            }
            if (Storage::disk('public')->exists($driver->driver->constanciaEstadoSalud)) {
                $driver->driver->constanciaEstadoSalud = Storage::url($driver->driver->constanciaEstadoSalud);
            }
            
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([],400);
        }
        
        

        return response()->json($driver,200);
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

            // testing Driver 's image
            $path_imagen = $person->imagen;
            if ($request->hasFile('imagen')) {
                Storage::delete($person->imagen);
                $path_imagen = Storage::disk('public')->put('drivers', $request->file('imagen'));
            }

            $person->nombre = $request->nombre;
            $person->apellidoPaterno = $request->apellidoPaterno;
            $person->apellidoMaterno = $request->apellidoMaterno;
            $person->telefono = $request->telefono;
            $person->direccion = $request->direccion;
            $person->imagen = $path_imagen;
            $person->numero = $request->numero; // ID CARD number
            $person->idDocumentType = $request->idDocumentType; // ID CARD type

            $person->save();

            /**
             * Driver Table that contains driver data
             */
            $driverdata = $driver->driver()->first();

            // Testing Health Status Document
            $path_estado_salud = $driverdata->constanciaEstadoSalud;
            if ($request->hasFile('constanciaEstadoSalud')) {
                Storage::delete($driverdata->constanciaEstadoSalud);
                $path_estado_salud = Storage::disk('public')->put('drivers', $request->file('constanciaEstadoSalud'));
            }

            $driverdata->licenciaConducir = $request->licenciaConducir;
            $driverdata->constanciaEstadoSalud = $path_estado_salud;
            $driverdata->cuentaBancaria = $request->cuentaBancaria;
            $driverdata->banco = $request->banco;

            $driverdata->save(); // update   driver data on Driver for a User
            
            /**
             * Lastly, you can commit a transaction via the commit method:
             */
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

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
            $driver = Driver::findOrFail($id);

            $driver->idStatus = 2; // 2 references to Inactive mode

            $driver->delete();
        } catch (\Throwable $th) {
            //throw $th;

            return response()
                    ->json([],400);
        }
        

        return response()
                    ->json([],204);
    }

    /**
     * Display a listing of the resource evaluated.
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
                                                    ->first() == null
                                            
                                                    OR
                                    
                                            $vehicle->first()
                                                    ->revisions()
                                                    ->orderBy('created_at', 'desc')
                                                    ->first()
                                                    ['requirement_status_id'] == 2;
                                })
                                ->first() == null

                                OR

                            $driver->driver()
                                ->first()
                                ->revisions()
                                ->orderBy('created_at', 'desc')
                                ->first()
                                ['requirement_status_id'] == 2;
            });

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

    /**
     * Display a listing of the query search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
                        
        $query = $request->query('query');

        $drivers = Driver::whereHas('person', function ($item) use ($query) {
            return $item->where('nombre', 'like', '%' . $query . '%')
                        ->orWhere('apellidoPaterno', 'like', '%' . $query . '%')
                        ->orWhere('apellidoMaterno', 'like', '%' . $query . '%')
                        ->orWhere('telefono', 'like', '%' . $query . '%')
                        ->orWhere('direccion', 'like', '%' . $query . '%')
                        ->orWhere('numero', 'like', '%' . $query . '%');
        })
        ->where('idUserType', 2)
        ->with('person', 'driver')
        ->paginate(15);
            

        foreach ($drivers->items() as $driver) {
            if (Storage::disk('public')->exists($driver->person->imagen)) {
                $driver->person->imagen = Storage::url($driver->person->imagen);
            }
            if (Storage::disk('public')->exists($driver->driver->constanciaEstadoSalud)) {
                $driver->driver->constanciaEstadoSalud = Storage::url($driver->driver->constanciaEstadoSalud);
            }
        }

        return response()->json($drivers, 200);
    }
}