<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Controller Mahasiswa
Route::get('/mahasiswa/index', [MahasiswaController::class,'index_mahasiswa']);
Route::get('/mahasiswa/read', [MahasiswaController::class,'mahasiswa_read']);
Route::post('/mahasiswa/create', [MahasiswaController::class,'mahasiswa_create']);
Route::put('/mahasiswa/update', [MahasiswaController::class, 'mahasiswa_update']);
Route::delete('/mahasiswa/delete/{nim}', [MahasiswaController::class, 'mahasiswa_destroy']);

//route login
Route::post('/login', [MahasiswaController::class, 'login']);


//Controller Dosen
Route::get('/dosen/index', [DosenController::class,'index_dosen']);
Route::get('/dosen/read', [DosenController::class,'dosen_read']);
Route::post('/dosen/create', [DosenController::class,'dosen_create']);
Route::put('/dosen/update', [DosenController::class, 'dosen_update']);
Route::delete('/dosen/delete/{nidn}', [DosenController::class, 'dosen_destroy']);

//Controller Dosen
Route::get('/index/makul', [MakulController::class,'index_makul']);
Route::get('/makul/read', [MakulController::class,'makul_read']);
Route::post('/makul/create', [MakulController::class,'makul_create']);
Route::put('/makul/update', [MakulController::class,'makul_update']);
Route::delete('/makul/delete/{kode_kelas}', [MakulController::class,'makul_destroy']);