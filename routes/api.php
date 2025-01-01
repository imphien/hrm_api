<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TimekeepingController;
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

Route::group(['middleware' => 'auth:api', 'prefix' => '/'], static function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/users/who-am-i', [UserController::class, 'getCurrentUser']);
    Route::resource('/users', UserController::class)->only(['show', 'store', 'update', 'destroy']);
    Route::get('/users', [UserController::class, 'getAll']);

    Route::get('/roles', [RoleController::class, 'getAll']);

    Route::resource('/recruitments', RecruitmentController::class)->only(['store', 'update']);
    Route::get('/recruitments', [RecruitmentController::class, 'getAll']);

    Route::resource('/notifications', NotificationController::class)->only(['store']);
    Route::get('/notifications', [NotificationController::class, 'getAll']);

    Route::resource('/approvals', ApprovalController::class)->only(['store', 'update']);
    Route::get('/approvals', [ApprovalController::class, 'getAll']);

    Route::get('/timekeeping', [TimekeepingController::class, 'getAll']);

    Route::get('/salaries', [SalaryController::class, 'getAll']);
    Route::post('/salaries/import', [SalaryController::class, 'import']);
});