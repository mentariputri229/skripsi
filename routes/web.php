<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\ProdusenController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\UsahaUserController;
use App\Http\Controllers\ProdusenUserController;
use App\Http\Controllers\BenihUnggulController;
use App\Http\Controllers\BenihUnggulUserController;
use App\Http\Controllers\VarietasLokalController;
use App\Http\Controllers\VarietasLokalUserController;
use App\Http\Controllers\HortikulturaController;
use App\Http\Controllers\HortikulturaUserController;
use App\Http\Controllers\PengedarHortikulturaController;
use App\Http\Controllers\PengedarHortikulturaUserController;
use App\Http\Controllers\PengedarLokalController;
use App\Http\Controllers\PengedarLokalUserController;
use App\Http\Controllers\PengedarUnggulController;
use App\Http\Controllers\PengedarUnggulUserController;
use App\Http\Controllers\ReportController;
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
        Route::resource('benihunggul', BenihUnggulController::class);
        Route::resource('varietaslokal', VarietasLokalController::class);
        Route::resource('hortikultura', HortikulturaController::class);
        Route::resource('pengedarhortikultura', PengedarHortikulturaController::class);
        Route::resource('pengedarunggul', PengedarunggulController::class);
        Route::resource('pengedarlokal', PengedarlokalController::class);


    });

});

Route::middleware(['user'])->group(function () {

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/index', [PemohonController::class, 'index'])->name('dashboard');

        Route::resource('user', UserEditController::class);
        Route::resource('usaha', UsahaUserController::class);
        Route::resource('produsen', ProdusenUserController::class);
        Route::resource('benihunggul', BenihUnggulUserController::class);
        Route::resource('varietaslokal', VarietasLokalUserController::class);
        Route::resource('hortikultura', HortikulturaUserController::class);
        Route::resource('pengedarhortikultura', PengedarHortikulturaUserController::class);
        Route::resource('pengedarunggul', PengedarunggulUserController::class);
        Route::resource('pengedarlokal', PengedarlokalUserController::class);
    });

});

Route::prefix('report')->name('report.')->group(function () {
    Route::get('/cetak/user', [ReportController::class, 'userAll'])->name('userAll');
    Route::get('/cetak/usaha', [ReportController::class, 'usahaAll'])->name('usahaAll');
    Route::get('/cetak/produsen', [ReportController::class, 'produsenAll'])->name('produsenAll');
    Route::get('/benihunggul/{id}', [ReportController::class, 'sertifikatunggul'])->name('sertifikatunggul');
    Route::get('/varietaslokal/{id}', [ReportController::class, 'sertifikatlokal'])->name('sertifikatlokal');
    Route::get('/hortikultura/{id}', [ReportController::class, 'sertifikathortikultura'])->name('sertifikathortikultura');
    Route::get('/pengedarbenihunggul/{id}', [ReportController::class, 'pengedarunggul'])->name('pengedarunggul');
    Route::get('/pengedarvarietaslokal/{id}', [ReportController::class, 'pengedarlokal'])->name('pengedarlokal');
    Route::get('/pengedarhortikultura/{id}', [ReportController::class, 'pengedarhortikultura'])->name('pengedarhortikultura');

    Route::get('/cetak/rekomendasilokalfilter', [ReportController::class, 'rekomendasilokalfilter'])->name('rekomendasilokalfilter');
    Route::get('/cetak/rekomendasiunggulfilter', [ReportController::class, 'rekomendasiunggulfilter'])->name('rekomendasiunggulfilter');
    Route::get('/cetak/rekomendasihortikulturafilter', [ReportController::class, 'rekomendasihortikulturafilter'])->name('rekomendasihortikulturafilter');
    Route::get('/cetak/pengedarlokalfilter', [ReportController::class, 'pengedarlokalfilter'])->name('pengedarlokalfilter');
    Route::get('/cetak/pengedarunggulfilter', [ReportController::class, 'pengedarunggulfilter'])->name('pengedarunggulfilter');
    Route::get('/cetak/pengedarhortikulturafilter', [ReportController::class, 'pengedarhortikulturafilter'])->name('pengedarhortikulturafilter');
    Route::post('/cetak/rekomendasilokalcetak', [ReportController::class, 'rekomendasilokalcetak'])->name('rekomendasilokalcetak');
    Route::post('/cetak/rekomendasiunggulcetak', [ReportController::class, 'rekomendasiunggulcetak'])->name('rekomendasiunggulcetak');
    Route::post('/cetak/rekomendasihortikulturacetak', [ReportController::class, 'rekomendasihortikulturacetak'])->name('rekomendasihortikulturacetak');
    Route::post('/cetak/pengedarlokalcetak', [ReportController::class, 'pengedarlokalcetak'])->name('pengedarlokalcetak');
    Route::post('/cetak/pengedarunggulcetak', [ReportController::class, 'pengedarunggulcetak'])->name('pengedarunggulcetak');
    Route::post('/cetak/pengedarhortikulturacetak', [ReportController::class, 'pengedarhortikulturacetak'])->name('pengedarhortikulturacetak');
});

