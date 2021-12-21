<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\EkskulController;

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
});
