<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AttachmentController;
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
Route::get('/about', [IndexController::class, 'about'])->name('about');

Route::get('loker/{job}', [IndexController::class, 'job'])->name('loker');
Route::get('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('signup', [AuthController::class, 'store']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('apply/{job}', [IndexController::class, 'apply'])->name('apply');
Route::get('download/{attachment}', [AttachmentController::class, 'download'])->name('download');

Route::prefix('dashboard')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('candidate', CandidateController::class);
        Route::resource('application', ApplicationController::class);
        Route::resource('job', JobController::class);
        Route::resource('attachment', AttachmentController::class);

        Route::get('processCandidate/{application}', [CandidateController::class, 'process'])->name('processCandidate');
        Route::get('terminateCandidate/{application}', [CandidateController::class, 'terminate'])->name('terminateCandidate');
    });
});
