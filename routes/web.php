<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('loker/{job}', [IndexController::class, 'job'])->name('loker');
Route::post('loker/{job}', [IndexController::class, 'applyJob'])->name('loker.apply');

Route::prefix('admin')->group(function() {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('candidate', CandidateController::class);
        Route::resource('job', JobController::class);

        Route::get('processCandidate/{candidate}', [CandidateController::class, 'process'])->name('processCandidate');
    });
});
