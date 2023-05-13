<?php

use App\Http\Controllers\Api\PertanyaanController as ApiPertanyaanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CuakController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\PertanyaanController;
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

Route::get('/', function () {
    return view('layouts.base');
});
Route::resource('/pertanyaan', PertanyaanController::class);
Route::resource('/kategori', KategoriController::class);

Route::get('login', [Logincontroller::class, 'index'])->name('login');
Route::get('register', [Logincontroller::class, 'registerForm'])->name('register');
Route::post('login-register', [Logincontroller::class, 'register'])->name('login.register');
Route::post('login', [Logincontroller::class, 'auth'])->name('login.auth');
Route::get('logout', [Logincontroller::class, 'logout'])->name('auth.logout');

Route::group(['middleware'=> ['auth','role:1,2']],function(){
    Route::post('/pertanyaan/cari', [ApiPertanyaanController::class, 'search'])->name('pertanyaan.search');
    Route::resource('/pertanyaan',PertanyaanController::class);
    Route::resource('/kategori',KategoriController::class);
    Route::resource('/jawaban', JawabanController::class);
});





