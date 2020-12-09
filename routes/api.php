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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// evaluating
Route::post('revisions', 'RevisionController@index');
Route::apiResource('revisions', RevisionController::class)->only(['show']);
Route::get('drivers/evaluations', 'DriverEvaluationController@all');

// searching
Route::get('drivers/{id}/vehicles/search', "VehicleController@search");
Route::get('drivers/search', "DriverController@search");

// getting suitable and unsuitable drivers
Route::get('drivers/evaluated', "DriverController@getEvaluated");

// api
/// drivers
Route::apiResource('drivers', DriverController::class);
/// services
Route::apiResource('services.images', Services\GalleryController::class)
                    ->only(['index','store','destroy']);
Route::get('services/all','ServiceController@all');
Route::get('services/states/{id}', 'ServiceController@get_services_from_specified_state');
Route::apiResource('services/states', Services\ServiceStateController::class)->only(['index']);
Route::get('services/{id}','ServiceController@index');
Route::apiResource('services', ServiceController::class)->only(['store','show']);

//payments
Route::post('checkout','Services\PaymentController@checkout');
Route::get('completed','Services\PaymentController@completed');

/// allocation vehicles
Route::apiResource('allocations.vehicles', Services\Allocations\AllocationVehicleController::class)
                    ->only(['index','store','destroy']);
/// allocation auxiliars
Route::apiResource('allocations.auxiliars', Services\Allocations\AllocationAuxiliarController::class)
                    ->only(['index', 'store', 'update', 'destroy']);
/// allocations
Route::get('allocations/{driver_id}', 'Services\Allocations\AllocationController@index');
Route::apiResource('allocations', Services\Allocations\AllocationController::class)
                    ->only(['store','update','destroy']);
/// vehicles
Route::apiResource('vehicles.subcategories', Vehicles\VehicleSubcategoryController::class)
                ->except(['update', 'show']);
Route::apiResource('vehicles', VehicleController::class);
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

// requirements
//Route::get('drivers/requirements',[Requirements\DriverRequirementController::class, 'index']);
Route::apiResource('requirements/drivers', Requirements\DriverRequirementController::class)->only([
    'index', 'store'
]);
Route::apiResource('requirements/vehicles', Requirements\VehicleRequirementController::class)->only([
    'index', 'store'
]);

Route::apiResource('drivers.vehicles', VehicleController::class);

Route::apiResource('drivers.evaluations', DriverEvaluationController::class);
Route::apiResource('vehicles.evaluations', VehicleEvaluationController::class);

Route::apiResource('products', ProductController::class)->only([
    'update'
]);
                  