<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Api for non-authenticated users
 */
Route::post('register', [\App\Http\Controllers\Auth\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);

/**
 * Api fot authenticated users
 */
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [\App\Http\Controllers\Auth\AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout']);

    // APIS for getting Revisions
    Route::post('revisions', 'RevisionController@index');
    Route::apiResource('revisions', RevisionController::class)->only(['show']);
    Route::get('drivers/evaluations', 'DriverEvaluationController@all');

    // APIS for Searching
    Route::get('drivers/{id}/vehicles/search', "VehicleController@search");
    Route::get('drivers/search', "DriverController@search");

    // APIS for Getting suitable and unsuitable drivers
    Route::get('drivers/evaluated', "DriverController@getEvaluated");

    // APIS for Drivers
    Route::apiResource('drivers', DriverController::class);

    // APIs for Payments
    Route::post('checkout','Services\PaymentController@checkout');
    Route::get('completed','Services\PaymentController@completed');

    /// APIS for Vehicles Allocation
    Route::apiResource('allocations.vehicles', Services\Allocations\AllocationVehicleController::class)
                        ->only(['index','store','destroy']);
    /// APIS for Auxiliars Allocation
    Route::apiResource('allocations.auxiliars', Services\Allocations\AllocationAuxiliarController::class)
                        ->only(['index', 'store', 'update', 'destroy']);
    /// APIS for Allocations
    Route::get('allocations/{driver_id}', 'Services\Allocations\AllocationController@index');

    Route::apiResource('allocations', Services\Allocations\AllocationController::class)
                        ->only(['store','update','destroy','index']);
    /// APIS for Vehicles
    Route::apiResource('vehicles.subcategories', Vehicles\VehicleSubcategoryController::class)
                    ->except(['update', 'show']);
    Route::apiResource('vehicles', VehicleController::class);

    // APIS for Requirements
    Route::apiResource('requirements/drivers', Requirements\DriverRequirementController::class)->only([
        'index', 'store'
    ]);
    Route::apiResource('requirements/vehicles', Requirements\VehicleRequirementController::class)->only([
        'index', 'store'
    ]);

    // APIS for Vehicles from Drivers
    Route::apiResource('drivers.vehicles', VehicleController::class);

    // API for Driver and Vehicle Evalutions
    Route::apiResource('drivers.evaluations', DriverEvaluationController::class);
    Route::apiResource('vehicles.evaluations', VehicleEvaluationController::class);
    
    // APIS for Service 
    Route::apiResource('services.images', Services\GalleryController::class)->only([
        'index','store','destroy'
    ]);
    Route::apiResource('services/states', Services\ServiceStateController::class)->only(['index']);
    Route::get('services/states/{id}', 'ServiceController@get_services_from_specified_state');

    // APIS for Modules from a User
    Route::get('modules', [App\Http\Controllers\LateralMenuController::class, 'get_menulateral']);

    // APIS for Driver Chief
    Route::apiResource('chiefs_drivers', DriverChiefController::class)->only(['index']);
});

/// services
Route::get('services/all','ServiceController@all');
Route::get('servicesall/{id}','ServiceController@index');
Route::apiResource('services', ServiceController::class)->only(['index','store','show']);

// getting prices
Route::apiResource('prices', Services\PriceController::class)->only([
    'index'
]);
Route::post('prices/cotizar', 'ServiceController@cotizar');

// getting types
Route::apiResource('vehicletypes', Types\VehicleTypeController::class);
Route::apiResource('documenttypes', Types\DocumentTypeController::class);
// getting categories
Route::apiResource('categories', Products\CategoryController::class)->only(['index']);
// getting places
Route::apiResource('zonas', Places\ZonaController::class)->only(['index']);
Route::apiResource('distritos', Places\DistritoController::class)->only(['index']);

Route::apiResource('products', ProductController::class)->only([
    'update'
]);