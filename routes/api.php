<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\CityController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::resource('city', 'CityController', ['except' => ['create', 'edit',]]);
    Route::get('all', [CityController::class, 'all'])->name('cisco');
    Route::resource('cisco', 'CiscoController', ['except' => ['create', 'edit',]]);
});