<?php

use App\Http\Controllers\Committee2Controller;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CommitteeController2;
use App\Http\Controllers\CommitteeCorrectController;
use App\Http\Controllers\CommitteeExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/test', [TestController::class, 'index'])->name('test');
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/test', [TestController::class, 'index'])->name('test');
    Route::get('/committee_exam', [CommitteeExamController::class, 'index'])->name('committee_exam');
    Route::get('/committee_correct', [CommitteeCorrectController::class, 'index'])->name('committee_correct');
    Route::get('/student', [StudentController::class, 'index'])->name('student');

});

require __DIR__ . '/auth.php';
