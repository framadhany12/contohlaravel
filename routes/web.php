<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'login_proses'])->name('postlogin');

Route::get('/register', [AuthController::class, 'regis'])->name('register');
Route::post('/store', [AuthController::class, 'store'])->name('authregister');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/', function () {
    return redirect(route('login'));
});


Route::resource('/student', StudentController::class)->middleware('auth');
Route::resource('/mahasiswa', MahasiswaController::class)->middleware('auth');

