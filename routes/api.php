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
Route::get('drivers/evaluations', 'DriverEvaluationController@all');

// searching
Route::get('drivers/{id}/vehicles/search', "VehicleController@search");
Route::get('drivers/search', "DriverController@search");

// getting suitable and unsuitable drivers
Route::get('drivers/evaluated', "DriverController@getEvaluated");

// api
Route::apiResource('drivers', DriverController::class);
Route::apiResource('services/states', Services\ServiceStateController::class)->only(['index']);
Route::apiResource('services', ServiceController::class)->only(['index', 'store','show']);
Route::apiResource('vehicles', VehicleController::class);
// getting prices
Route::apiResource('prices', Services\PriceController::class)->only([
    'index'
]);

// getting types
Route::apiResource('vehicletypes', Types\VehicleTypeController::class);
Route::apiResource('documenttypes', Types\DocumentTypeController::class);

// requirements
//Route::get('drivers/requirements',[Requirements\DriverRequirementController::class, 'index']);
Route::apiResource('requirements/drivers', Requirements\DriverRequirementController::class);
Route::apiResource('requirements/vehicles', Requirements\VehicleRequirementController::class)->only([
    'index'
]);

Route::apiResource('drivers.vehicles', VehicleController::class);

Route::apiResource('drivers.evaluations', DriverEvaluationController::class);
Route::apiResource('vehicles.evaluations', VehicleEvaluationController::class);