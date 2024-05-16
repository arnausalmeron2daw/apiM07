<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::apiResource('/products', ProductController::class)->middleware('auth:sanctum');
Route::apiResource('/provider', ProviderController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    //PRODUCT

    Route::get('/products', [ProductController::class, 'index']);

    Route::get('/products/{id}', [ProductController::class, 'show']);

    Route::put('/products/{id}', [ProductController::class, 'update']);

    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    Route::post('/products', [ProductController::class, 'store']);

    //PROVIDER

    Route::get('/provider', [ProviderController::class, 'index']);

    Route::get('/provider/{id}', [ProviderController::class, 'show']);

    Route::put('/provider/{id}', [ProviderController::class, 'update']);

    Route::delete('/provider/{id}', [ProviderController::class, 'destroy']);

    Route::post('/provider', [ProviderController::class, 'store']);

    return $request->user();


});


