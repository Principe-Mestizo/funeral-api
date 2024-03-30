<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use Illuminate\Http\Request;
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

Route::group(['prefix' => 'v1'], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::delete('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::apiResource('usuarios', UserController::class);
    Route::apiResource('services', ServicesController::class);
    Route::apiResource('productos', ProductsController::class);
    Route::apiResource('ventas', VentaController::class);
    Route::apiResource('formularios', FormularioController::class);

    Route::get('/total-services', [ServicesController::class, 'getTotal']);
    Route::get('/total-users', [ServicesController::class, 'getTotalUsers']);
    Route::get('/total-solicitud', [ServicesController::class, 'getTotalSolicitudes']);
});


