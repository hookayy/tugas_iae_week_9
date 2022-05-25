<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');
Route::get('/kesehatan', [HomeController::class, 'kesehatan'])->name('kesehatan');
Route::get('/keaktifan', [HomeController::class, 'keaktifan'])->name('keaktifan');
Route::get('/kelulusan', [HomeController::class, 'kelulusan'])->name('kelulusan');
Route::get('/registrasi', [HomeController::class, 'registrasi'])->name('registrasi');
