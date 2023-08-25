<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//=======================all route api testing===============================//
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('/skills', SkillsController::class);
    Route::apiResource('/customers', CustomersController::class);
    Route::apiResource('/categories',CategoriesController::class);
    Route::apiResource('/products', ProductsController::class);
Route::get('/category', 'OrderController@getCategory');
    Route::get('/table', 'OrderController@getTable');
    Route::post('/order-item', 'OrderController@store');
});