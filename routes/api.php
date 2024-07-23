<?php

use App\Http\Controllers\Api\CheckController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CheckCategoryController;
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
    Route::post('/student', [StudentController::class, 'index']);
    Route::post('/check', [CheckController::class, 'index']);
    Route::post('/category', [CheckCategoryController::class, 'index']);

    Route::get('/check', [CheckController::class, 'index'])->name('checks.index');
    Route::post('/check', [CheckController::class, 'store'])->name('checks.store');
    Route::get('/check/{id}', [CheckController::class, 'show'])->name('checks.show');
    Route::put('/check/{id}', [CheckController::class, 'update'])->name('checks.update');
    Route::delete('/check/{id}', [CheckController::class, 'destroy'])->name('checks.destroy');
    // Add other student-related routes here
});
