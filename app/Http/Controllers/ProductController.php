<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $path = $product->imagen;
            if ($request->hasFile('imagen')) {
                $path = Storage::disk('public')->put('products', $request->file('imagen'));
            }

            $product->alto = $request->alto;
            $product->ancho = $request->ancho;
            $product->largo = $request->largo;
            $product->peso = $request->peso;
            $product->precio_unitario = $request->precio_unitario;
            $product->cantidad = $request->cantidad;
            $product->descripcion = $request->descripcion;
            $product->imagen = $path;

            $product->save();

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
            return response()->json([
                'error' => 'Something was wrong'
            ], 400);
        }

        return response()
                    ->json([], 200);
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
