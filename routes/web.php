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


//RUTAS DE API
// evaluating
Route::post('api/revisions', 'RevisionController@index');
Route::apiResource('revisions', RevisionController::class)->only(['show']);
Route::get('api/drivers/evaluations', 'DriverEvaluationController@all');

// searching
Route::get('api/drivers/{id}/vehicles/search', "VehicleController@search");
Route::get('api/drivers/search', "DriverController@search");

// getting suitable and unsuitable drivers
Route::get('api/drivers/evaluated', "DriverController@getEvaluated");

// api
/// drivers
Route::apiResource('api/drivers', DriverController::class);
/// services
Route::apiResource('api/services.images', Services\GalleryController::class)
                    ->only(['index','store','destroy']);
Route::get('api/services/all','ServiceController@all');
Route::get('api/services/states/{id}', 'ServiceController@get_services_from_specified_state');
Route::apiResource('api/services/states', Services\ServiceStateController::class)->only(['index']);
Route::get('api/servicesall/{id}','ServiceController@index');
Route::apiResource('api/services', ServiceController::class)->only(['store','show']);

//payments
Route::post('api/checkout','Services\PaymentController@checkout');
Route::get('api/completed','Services\PaymentController@completed');

/// allocation vehicles
Route::apiResource('api/allocations.vehicles', Services\Allocations\AllocationVehicleController::class)
                    ->only(['index','store','destroy']);
/// allocation auxiliars
Route::apiResource('api/allocations.auxiliars', Services\Allocations\AllocationAuxiliarController::class)
                    ->only(['index', 'store', 'update', 'destroy']);
/// allocations
Route::get('api/allocations/{driver_id}', 'Services\Allocations\AllocationController@index');
Route::apiResource('api/allocations', Services\Allocations\AllocationController::class)
                    ->only(['store','update','destroy']);
/// vehicles
Route::apiResource('api/vehicles.subcategories', Vehicles\VehicleSubcategoryController::class)
                ->except(['update', 'show']);
Route::apiResource('api/vehicles', VehicleController::class);
// getting prices
Route::apiResource('api/prices', Services\PriceController::class)->only([
    'index'
]);
Route::post('api/prices/cotizar', 'ServiceController@cotizar');

// getting types
Route::apiResource('api/vehicletypes', Types\VehicleTypeController::class);
Route::apiResource('api/documenttypes', Types\DocumentTypeController::class);
// getting categories
Route::apiResource('api/categories', Products\CategoryController::class)->only(['index']);
// getting places
Route::apiResource('api/zonas', Places\ZonaController::class)->only(['index']);
Route::apiResource('api/distritos', Places\DistritoController::class)->only(['index']);

// requirements
//Route::get('drivers/requirements',[Requirements\DriverRequirementController::class, 'index']);
Route::apiResource('api/requirements/drivers', Requirements\DriverRequirementController::class)->only([
    'index', 'store'
]);
Route::apiResource('api/requirements/vehicles', Requirements\VehicleRequirementController::class)->only([
    'index', 'store'
]);

Route::apiResource('api/drivers.vehicles', VehicleController::class);

Route::apiResource('api/drivers.evaluations', DriverEvaluationController::class);
Route::apiResource('api/vehicles.evaluations', VehicleEvaluationController::class);

Route::apiResource('api/products', ProductController::class)->only([
    'update'
]);
//RUTAS DE API FIN

