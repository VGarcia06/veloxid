<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Driver;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DriverChiefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver_chiefs = User::withTrashed()
                                ->where('idUserType',3)
                                ->with(
                                    'person', 
                                    'driver', 
                                    'status')                        
                                ->get();

        return response()->json(
            $driver_chiefs, 
            Response::HTTP_OK
        );
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
            $driver_chief = new User;

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
            $driver_chief->name = $request->name;
            $driver_chief->email = $request->email;
            $driver_chief->password = Hash::make($request->password);
            $driver_chief->idUserType = 3; // The 2 is defined as Jefe de Conductores/Driver Chief
            $driver_chief->idStatus = 1; // Driver is always activated once is created

            $driver_chief->save();

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
                    ->json([], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()
                    ->json(
                        User::withTrashed()->findOrFail($id), 
                        Response::HTTP_OK
                    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            User::withTrashed()->findOrFail($id)->update($request->all());


        } catch (\Throwable $th) {
            throw $th;

            return response()
                    ->json(
                        [],
                        Response::HTTP_ERROR
                    );
        }

        return response()
                    ->json(
                        [], 
                        Response::HTTP_OK
                    );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
