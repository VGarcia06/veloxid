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
Route::apiResource('revisions', RevisionController::class)->only(['index', 'show']);
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
Route::get('services/states/{id}', 'ServiceController@get_services_from_specified_state');
Route::apiResource('services/states', Services\ServiceStateController::class)->only(['index']);
Route::apiResource('services', ServiceController::class)->only(['index', 'store','show']);
/// allocation vehicles
Route::apiResource('allocations.vehicles', Services\Allocations\AllocationVehicleController::class)
                    ->only(['index','store','destroy']);
/// allocation auxiliars
Route::apiResource('allocations.auxiliars', Services\Allocations\AllocationAuxiliarController::class)
                    ->only(['index', 'store', 'update', 'destroy']);
/// allocations
Route::apiResource('allocations', Services\Allocations\AllocationController::class)
                    ->only(['index','store','update','destroy']);
/// vehicles
Route::apiResource('vehicles.subcategories', Vehicles\VehicleSubcategoryController::class)
                ->except(['update', 'show']);
Route::apiResource('vehicles', VehicleController::class);
// getting prices
Route::apiResource('prices', Services\PriceController::class)->only([
    'index'
]);

// getting types
Route::apiResource('vehicletypes', Types\VehicleTypeController::class);
Route::apiResource('documenttypes', Types\DocumentTypeController::class);
// getting categories
Route::apiResource('categories', Products\CategoryController::class)->only(['index']);
// getting categories
Route::apiResource('zonas', Places\ZonaController::class)->only(['index']);

// requirements
//Route::get('drivers/requirements',[Requirements\DriverRequirementController::class, 'index']);
Route::apiResource('requirements/drivers', Requirements\DriverRequirementController::class);
Route::apiResource('requirements/vehicles', Requirements\VehicleRequirementController::class)->only([
    'index'
]);

Route::apiResource('drivers.vehicles', VehicleController::class);

Route::apiResource('drivers.evaluations', DriverEvaluationController::class);
Route::apiResource('vehicles.evaluations', VehicleEvaluationController::class);