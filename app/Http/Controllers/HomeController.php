<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexcotizacion()
    {
        return view('Cliente/cotization');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
        return view('Jefe_Transporte/vehicle')->with(['id' => $request->id]);
    }

    public function detail(Request $request)
    {
        $detail = [
            ['driver' => $request->driver],
            ['revision' => $request->revision]
        ];
       return view('Jefe_Transporte/revisionDetail', compact('detail'));
    }
}
