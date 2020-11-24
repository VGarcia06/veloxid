<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use Illuminate\Http\Request;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->from == "" AND $request->to != "") {
                $revisions = Revision::whereDate('created_at', '<=', $request->to)
                                        ->orderBy('id', 'desc')
                                        ->with('driver.user.person')
                                        ->paginate(12);
                
                return response()->json($revisions, 200);
            } else {
                if ($request->from != "" AND $request->to == "") {
                    $revisions = Revision::whereDate('created_at','>=',$request->from)
                                            ->orderBy('id', 'desc')
                                            ->with('driver.user.person')
                                            ->paginate(12);
                    
                    return response()->json($revisions, 200);
                } else {
                    if ($request->from == "" AND $request->to == "") {
                        $revisions = Revision::orderBy('id', 'desc')
                                                ->with('driver.user.person')
                                                ->paginate(12);
                    
                        return response()->json($revisions, 200);
                    }
                }
                
            }
            $revisions = Revision::whereDate('created_at','>=',$request->from)
                                    ->whereDate('created_at', '<=', $request->to)
                                    ->orderBy('id', 'desc')
                                    ->with('driver.user.person')
                                    ->paginate(12);
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 400);
        }

        return response()->json($revisions, 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $revision = Revision::findOrFail($id)
                                    ->load(
                                        'driver.user.person', 
                                        'driver_revisions.status',
                                        'driver_revisions.requirements',
                                        'vehicle_revisions.vehicle', 
                                        'vehicle_revisions.status',
                                        'vehicle_revisions.requirements'
                                    );
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 400);
        }

        return response()->json($revision, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
