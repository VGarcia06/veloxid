<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/conductoresbuscar', 'HomeController@show')->middleware('auth');

Route::get('/conductores', function () {
    return view('Jefe_Transporte/driver');
})->middleware('auth');

Route::get('/evaluacion', function () {
    return view('Jefe_Transporte/evaluation');
})->middleware('auth');

Route::get('/cotizacion', function () {
    return view('Cliente/cotization');
})->middleware('auth');

Route::get('/tracking', function () {
    return view('Cliente/tracking');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::apiResource('drivers', DriverController::class);
Route::apiResource('vehicles', VehicleController::class);


//Ruta de los modulos para el Menu Lateral
Route::get('get_menulateral', 'LateralMenuController@get_menulateral');

