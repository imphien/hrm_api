<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['prefix' => '/'], static function () {
    Route::resource('/users', UserController::class)->only(['show', 'store', 'update', 'destroy']);
    Route::get('/users', [UserController::class, 'getAll']);

    Route::get('/roles', [RoleController::class, 'getAll']);

    Route::get('/recruitments', [RecruitmentController::class, 'getAll']);
})->middleware('auth');