<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\TahunAjarController;


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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', function () {
            return view('sample.profile.index');
        })->name('index');
    });

    Route::group(['prefix' => 'blank', 'as' => 'blank.'], function () {
        Route::get('/', function () {
            return view('sample.blank.index');
        })->name('index');
    });

    Route::group(['prefix' => 'pengumuman', 'as' => 'pengumuman.'], function () {
        Route::get('/', [PengumumanController::class, 'index'])->name('index');
        Route::get('create', [PengumumanController::class, 'create'])->name('create');
        Route::post('store', [PengumumanController::class, 'store'])->name('store');
        Route::get('edit/{pengumuman}', [PengumumanController::class, 'edit'])->name('edit');
        Route::patch('update/{pengumuman}', [PengumumanController::class, 'update'])->name('update');
        Route::delete('destroy/{pengumuman}', [PengumumanController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [PengumumanController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
        Route::get('/', [SiswaController::class, 'index'])->name('index');
        Route::get('create', [SiswaController::class, 'create'])->name('create');
        Route::post('store', [SiswaController::class, 'store'])->name('store');
        Route::get('show/{siswa}', [SiswaController::class, 'show'])->name('show');
        Route::get('edit/{siswa}', [SiswaController::class, 'edit'])->name('edit');
        Route::patch('update/{siswa}', [SiswaController::class, 'update'])->name('update');
        Route::delete('destroy/{siswa}', [SiswaController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [SiswaController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'kelas', 'as' => 'kelas.'], function () {
        Route::get('/', [KelasController::class, 'index'])->name('index');
        Route::get('create', [KelasController::class, 'create'])->name('create');
        Route::post('store', [KelasController::class, 'store'])->name('store');
        Route::get('edit/{kelas}', [KelasController::class, 'edit'])->name('edit');
        Route::patch('update/{kelas}', [KelasController::class, 'update'])->name('update');
        Route::delete('destroy/{kelas}', [KelasController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [KelasController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'mapel', 'as' => 'mapel.'], function () {
        Route::get('/', [MapelController::class, 'index'])->name('index');
        Route::get('create', [MapelController::class, 'create'])->name('create');
        Route::post('store', [MapelController::class, 'store'])->name('store');
        Route::get('edit/{mapel}', [MapelController::class, 'edit'])->name('edit');
        Route::patch('update/{mapel}', [MapelController::class, 'update'])->name('update');
        Route::delete('destroy/{mapel}', [MapelController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [MapelController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'ekskul', 'as' => 'ekskul.'], function () {
        Route::get('/', [EkskulController::class, 'index'])->name('index');
        Route::get('create', [EkskulController::class, 'create'])->name('create');
        Route::post('store', [EkskulController::class, 'store'])->name('store');
        Route::get('edit/{ekskul}', [EkskulController::class, 'edit'])->name('edit');
        Route::patch('update/{ekskul}', [EkskulController::class, 'update'])->name('update');
        Route::delete('destroy/{ekskul}', [EkskulController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [EkskulController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::patch('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [UserController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'guru', 'as' => 'guru.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::get('show/{user}', [UserController::class, 'show'])->name('show');
        Route::patch('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{level}', [UserController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'ortu', 'as' => 'ortu.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::get('show/{user}', [UserController::class, 'show'])->name('show');
        Route::patch('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable/{level}', [UserController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'wali_kelas', 'as' => 'wali_kelas.'], function () {
        Route::get('/', [WaliKelasController::class, 'index'])->name('index');
        Route::get('create', [WaliKelasController::class, 'create'])->name('create');
        Route::post('store', [WaliKelasController::class, 'store'])->name('store');
        Route::get('edit/{wali_kelas}', [WaliKelasController::class, 'edit'])->name('edit');
        Route::patch('update/{wali_kelas}', [WaliKelasController::class, 'update'])->name('update');
        Route::delete('destroy/{wali_kelas}', [WaliKelasController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [WaliKelasController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'tahun_ajar', 'as' => 'tahun_ajar.'], function () {
        Route::get('/', [TahunAjarController::class, 'index'])->name('index');
        Route::get('create', [TahunAjarController::class, 'create'])->name('create');
        Route::post('store', [TahunAjarController::class, 'store'])->name('store');
        Route::get('edit/{tahun_ajar}', [TahunAjarController::class, 'edit'])->name('edit');
        Route::patch('update/{tahun_ajar}', [TahunAjarController::class, 'update'])->name('update');
        Route::delete('destroy/{tahun_ajar}', [TahunAjarController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [TahunAjarController::class, 'datatable'])->name('datatable');
    });
});
