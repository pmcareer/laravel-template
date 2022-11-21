<?php

use App\Http\Controllers\AuthApiController;
use App\Models\Product;
use App\Http\Controllers\ProductController;

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

//Auth
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthApiController::class, 'logout']);
});


//Products
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::group(['middleware' => ['auth:sanctum']], function(){
    // Route::apiResource('/users', UsersController::class);
    // Route::apiResource('/products', ProductController::class);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'delete']);    
});


