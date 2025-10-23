<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BeritaDesaController;
use App\Http\Controllers\DemografiDesaController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\PemerintahDesaController;
use App\Http\Controllers\PotensiDesaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilDesaController;



// ======================
// Route Frontend (umum / pengunjung)
// ======================
Route::get('/', [HomeController::class, 'index'])->name('home');


// ======================
// Route awal -> redirect ke login
// ======================
// Route::get('/', fn() => redirect()->route('login'));

// ======================
// Route untuk autentikasi (login, register, dll)
// ======================
require __DIR__ . '/auth.php';

// ======================
// Route Dashboard (Multi Role: Admin & Operator)
// ======================
Route::middleware(['auth', 'role:admin,operator'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile (bisa diakses semua user login)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Profil Desa (Admin & Operator)
    Route::get('profil-desa/edit', [ProfilDesaController::class, 'edit'])->name('profil-desa.edit');
    Route::post('profil-desa/update-visi-misi', [ProfilDesaController::class, 'updateVisiMisi'])->name('profil-desa.updateVisiMisi');
    Route::post('profil-desa/update-sejarah', [ProfilDesaController::class, 'updateSejarah'])->name('profil-desa.updateSejarah');
    Route::post('profil-desa/update-peta', [ProfilDesaController::class, 'updatePeta'])->name('profil-desa.updatePeta');

    // Pemerintah Desa (Admin & Operator)
    Route::resource('pemerintah-desa', PemerintahDesaController::class)->except(['show']);

    // Berita Desa (Admin & Operator)
    Route::resource('berita-desa', BeritaDesaController::class)->except(['show']);

    // Potensi Desa (Admin & Operator)
    Route::resource('potensi-desa', PotensiDesaController::class)->except(['show']);

    // Demografi Desa (Admin & Operator)
    Route::resource('demografi-desa', DemografiDesaController::class)->except(['show']);

});

// ======================
// Route khusus Admin
// ======================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', UserController::class);
    });

// ======================
// Route Frontend (umum / pengunjung)
// ======================
