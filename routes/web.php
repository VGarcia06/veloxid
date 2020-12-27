<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ruta de los modulos para el Menu Lateral
Route::get('get_menulateral', 'LateralMenuController@get_menulateral');

Route::get('/', function () {
    return view('welcome');
});

//Jefe de Transporte
Route::get('/conductoresbuscar', 'HomeController@show')->middleware('auth');
Route::get('/revisionesdetalle', 'HomeController@detail')->middleware('auth');

Route::get('/conductores', function () {
    return view('Jefe_Transporte/driver');
})->middleware('auth');

Route::get('/evaluacion', function () {
    return view('Jefe_Transporte/evaluation');
})->middleware('auth');

Route::get('/revisiones', function () {
    return view('Jefe_Transporte/revisionHistory');
})->middleware('auth');

Route::get('/pedidos', function () {
    return view('Jefe_Transporte/order');
})->middleware('auth');

Route::get('/pedidoss', function () {
    return view('Jefe_Transporte/orders');
})->middleware('auth');


//Conductor
Route::get('/confirmacionconductor', function () {
    return view('Conductor/orderconfirmation');
})->middleware('auth');

//Cliente
Route::get('/cotizacion', function () {
    return view('Cliente/cotization');
})->name('cotizacion');

Route::post('/request', function (Request $request) {
    $service_decode = json_decode($request->service,true);
    $user = Auth::user();
    return view('Cliente/request')->with([
        'service_req' => $service_decode,
        'user' => $user
    ]);
})->middleware('auth:web')->name('request');

Route::get('/tracking', function () {
    $user = Auth::user();
    return view('Cliente/tracking')->with([
        'user' => $user
    ]);
})->middleware('auth');

Auth::routes();

//Vista General
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/cotizacion', 'HomeController@indexcotizacion')->name('cotizacion');

//Prueba
Route::get('/prueba', function () {
    return view('Jefe_Transporte/prueba');
});




