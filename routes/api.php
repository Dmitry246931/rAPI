<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [\App\Http\Controllers\Api\UserController::class, 'index']) ->name('index');
Route::get('users/{id}', [\App\Http\Controllers\Api\UserController::class, 'show']);
Route::post('users/create', [\App\Http\Controllers\Api\UserController::class, 'store']);
Route::put('users/update/{user}', [\App\Http\Controllers\Api\UserController::class, 'update']);
Route::delete('users/destroy/{user}', [\App\Http\Controllers\Api\UserController::class, 'destroy']);

Route::get('users/{id}/addresses', [\App\Http\Controllers\Api\UserController::class, 'addresses']);
Route::post('users/addresses/new_address', [\App\Http\Controllers\Api\AddressController::class, 'store']);

