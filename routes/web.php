<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\ProdusenController;
use App\Http\Controllers\PemohonController;
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

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginPost');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store_register'])->name('store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['admin'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/index', [MainController::class, 'index'])->name('beranda');

        Route::resource('user', UserController::class);
        Route::resource('usaha', UsahaController::class);
        Route::resource('produsen', ProdusenController::class);
    });

});

Route::middleware(['user'])->group(function () {

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/index', [PemohonController::class, 'index'])->name('dashboard');


    });
});
