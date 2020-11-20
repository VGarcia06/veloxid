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


//Conductor
Route::get('/confirmacionconductor', function () {
    return view('Conductor/orderconfirmation');
})->middleware('auth');

//Cliente
Route::get('/cotizacion', function () {
    return view('Cliente/cotization');
})->middleware('auth');

Route::get('/tracking', function () {
    return view('Cliente/tracking');
})->middleware('auth');

Auth::routes();

//Vista General
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cotizacion', 'HomeController@indexcotizacion')->name('cotizacion');




