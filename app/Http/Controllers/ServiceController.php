<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Service;
use App\Models\Price;
use App\Models\Places\Distrito;
use App\Models\Product\Subcategory;
use App\Models\States\ServiceState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        try {
            
            $user = User::findOrFail($user_id);

            $services = $user
                            ->services()
                            ->with(
                                'state',
                                'products.subcategory.vehicle_type',
                                'products.subcategory.category', 
                                'distrito_origen.zona', 
                                'distrito_destino.zona'
                            )
                            ->paginate(12);

        } catch (\Throwable $th) {
            throw $th;
        }
        

        return response()->json($services, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            DB::beginTransaction();

            $input = $request->all();

            

            $service = Service::create([
                'direccion_origen' => $input['direccion_origen'],
                'direccion_destino' => $input['direccion_destino'],
                'distrito_origen_id' => $input['distrito_origen_id'],
                'distrito_destino_id' => $input['distrito_destino_id'],
                'fecha_recojo' => $input['fecha_recojo'],
                'fecha_entrega' => $input['fecha_entrega'],
                'total' => $input['total'],
                'transaction_id' => $input['transaction_id'],
                'user_id' => $input['user']['id'],
                'service_state_id' => 1 // Initial
            ]);


            if ($request->hasFile('products.imagen')) {
                foreach ($request->file('products.imagen') as $image) {
                    $image = Storage::url(Storage::disk('public')->put('products', $image));

                }
            }

            $input = $request->all();

            $service->products()->createMany($input['products']);

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
            return response()
                            ->json([], 400);
        }
        
        return response()
                        ->json([], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $service = Service::findOrFail($id)
                                    ->load(
                                        'products.subcategory.vehicle_type',
                                        'products.subcategory.category',
                                        'distrito_origen.zona',
                                        'distrito_destino.zona'
                                    );
        } catch (\Throwable $th) {
            throw $th;
            return response()->json([], 400);
        }
        
        return response()->json($service, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * listing the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function get_services_from_specified_state($id)
    {
        try {
            $services = Service::where('service_state_id', $id)
                                ->with(
                                    'state',
                                    'products.subcategory.vehicle_type',
                                    'products.subcategory.category', 
                                    'distrito_origen.zona', 
                                    'distrito_destino.zona'
                                )->paginate(12);

        } catch (\Throwable $th) {
            throw $th;

            return response()->json($services, 200);
        }

        return response()->json($services, 200);
    }

    /**
     * listing the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cotizar(Request $request)
    {
        try {
            
            $price = Price::where('zona_origen_id', Distrito::find($request->distrito_origen_id)->zona()->first()->id)
                                ->where('zona_destino_id', Distrito::find($request->distrito_destino_id)->zona()->first()->id)
                                ->where('vehicle_type_id', Subcategory::find($request->subcategory_id)->vehicle_type()->first()->id)
                                ->first()['price'];
            
        } catch (\Throwable $th) {
            throw $th;

            return response()->json([], 200);
        }

        return response()->json($price, 200);
    }

    public function all()
    {
        try {
            $services = Service::where('service_state_id',1)
                                ->with(
                                    'state',
                                    'products.subcategory.vehicle_type',
                                    'products.subcategory.category', 
                                    'distrito_origen.zona', 
                                    'distrito_destino.zona'
                                )->paginate(12);
        } catch (\Throwable $th) {
            //throw $th;

            return response()->json([],400);
        }

        return response()->json($services,200);
    }
}
