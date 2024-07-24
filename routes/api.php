<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('students', StudentController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('checks', CheckController::class);
});
