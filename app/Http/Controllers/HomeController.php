<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->idUserType==3){
          return view('home');
        }
        if(Auth::user()->idUserType==1){
            $user = Auth::user();
        return view('Cliente/tracking')->with([
        'user' => $user
        ]);
        };
        if(Auth::user()->idUserType==2){
            $user = Auth::user();
         return view('Conductor/orderconfirmation')->with([
        'user' => $user
        ]);
        };
    }

    public function indexcotizacion()
    {
        return view('Cliente/cotization');
    }

    public function homecliente()
    {
        return view('homeclient');
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
       return view('Jefe_Transporte/revisionDetail')->with(['revision' => $request->revision]);
    }
}
