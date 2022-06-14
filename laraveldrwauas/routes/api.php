<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//create
Route::post('/kelas/add',[App\Http\Controllers\KelasController::class, 'add']);
Route::post('/mapel/add',[App\Http\Controllers\MapelController::class, 'add']);
Route::post('/guru/add',[App\Http\Controllers\GuruController::class, 'add']);
Route::post('/jadwalguru/add',[App\Http\Controllers\JadwalGuruController::class, 'add']);
Route::post('/presensiharian/add',[App\Http\Controllers\PresensiHarianController::class, 'add']);
Route::post('/presensimengajar/add',[App\Http\Controllers\PresensiMengajarController::class, 'add']);
//read
Route::get('/kelas/list',[App\Http\Controllers\KelasController::class, 'list']);
Route::get('/mapel/list',[App\Http\Controllers\MapelController::class, 'list']);
Route::get('/guru/list',[App\Http\Controllers\GuruController::class, 'list']);
Route::get('/jadwalguru/list',[App\Http\Controllers\JadwalGuruController::class, 'list']);
Route::get('/presensiharian/list',[App\Http\Controllers\PresensiHarianController::class, 'list']);
Route::get('/presensimengajar/list',[App\Http\Controllers\PresensiMengajarController::class, 'list']);
//update
Route::put('/kelas/edit',[App\Http\Controllers\KelasController::class, 'edit']);