<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TitipController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\SewaController;

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

# ------ Unauthenticated routes ------ #
Route::get('/', [AuthenticatedSessionController::class, 'create']);
require __DIR__.'/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('home'); # dashboard

    Route::resource('users', UserController::class);

    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraans.index');
    Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraans.create');
    Route::post('/kendaraan/store', [KendaraanController::class, 'store'])->name('kendaraans.store');
    Route::get('/kendaraan/edit/{id}', [KendaraanController::class, 'edit'])->name('kendaraans.edit');
    Route::put('/kendaraan/update/{id}', [KendaraanController::class, 'update'])->name('kendaraans.update');
    Route::delete('/kendaraan/destroy/{id}', [KendaraanController::class, 'destroy'])->name('kendaraans.destroy');

    Route::get('/titip', [TitipController::class, 'index'])->name('titips.index');
    // Route::get('/titip/{merk}/{jenis}', [TitipController::class, 'showByMerkAndJenis'])->name('titips.showByMerkAndJenis');
    Route::get('/titip/create', [TitipController::class, 'create'])->name('titips.create');
    Route::post('/titip/store', [TitipController::class, 'store'])->name('titips.store');
    Route::get('/titip/edit/{id}', [TitipController::class, 'edit'])->name('titips.edit');
    Route::put('/titip/update/{id}', [TitipController::class, 'update'])->name('titips.update');
    Route::delete('/titip/destroy/{id}', [TitipController::class, 'destroy'])->name('titips.destroy');

    Route::get('/sewa', [SewaController::class, 'index'])->name('sewas.index');
    Route::get('/sewa/create', [sewaController::class, 'create'])->name('sewas.create');
    Route::post('/sewa/store', [sewaController::class, 'store'])->name('sewas.store');
    Route::get('/sewa/edit/{id}', [sewaController::class, 'edit'])->name('sewas.edit');
    Route::put('/sewa/update/{id}', [sewaController::class, 'update'])->name('sewas.update');
    Route::delete('/sewa/destroy/{id}', [sewaController::class, 'destroy'])->name('sewas.destroy');
});
