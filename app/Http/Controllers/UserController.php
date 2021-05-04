<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::withTrashed()->findOrFail($id);

            $user->restore();

            $user->idStatus = 1; // 1 references to Active mode

            $user->save();
        } catch (\Throwable $th) {
            throw $th;

            return response()
                    ->json([], 400);
        }
        

        return response()
                    ->json([], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->idStatus = 2; // 2 references to Inactive mode

            $user->delete();

            $user->save();

        } catch (\Throwable $th) {
            //throw $th;

            return response()
                    ->json([],400);
        }
        

        return response()
                    ->json([], Response::HTTP_OK);
    }
}
