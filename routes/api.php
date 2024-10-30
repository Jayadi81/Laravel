<?php

use Illuminate\Http\Request;
use App\Models\Kelas;

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

Route::post('/createsiswa',[SiswaController::class, 'createsiswa']);
Route::get('/getsiswa',[SiswaController::class, 'getsiswa']);
Route::post('/createkelas',[KelasController::class, 'createkelas']);