<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TlogController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::apiResource('karyawan', KaryawanController::class);
    Route::apiResource('tlog', TlogController::class);
});


// Route untuk login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Karyawan routes
Route::post('/karyawan', [KaryawanController::class, 'store']);
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
Route::get('/karyawan/export', [KaryawanController::class, 'export']);

// Tlog routes
Route::post('/tlog', [TlogController::class, 'store']);
Route::get('/tlog', [TlogController::class, 'index']);
Route::put('/tlog/{id}', [TlogController::class, 'update']);
Route::delete('/tlog/{id}', [TlogController::class, 'destroy']);
Route::get('/tlog/export', [TlogController::class, 'export']);
