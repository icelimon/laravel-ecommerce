<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RoleController;
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
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:api', 'token'])->group(function() {
    Route::resource('/product', ProductController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/policy', PolicyController::class);
    Route::resource('/resource', ResourceController::class);
});
