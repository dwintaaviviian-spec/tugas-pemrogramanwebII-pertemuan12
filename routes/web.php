<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
/*
|--------------------------------------------------------------------------
| Buku
|--------------------------------------------------------------------------
*/

Route::get('/buku', [BukuController::class, 'index'])
    ->name('buku.index');

Route::get('/buku/create', [BukuController::class, 'create'])
    ->name('buku.create');

Route::post('/buku', [BukuController::class, 'store'])
    ->name('buku.store');

Route::get('/buku/kategori/{kategori}', [BukuController::class, 'kategori'])
    ->name('buku.kategori');

Route::get('/buku/search', [BukuController::class, 'search'])
    ->name('buku.search');

Route::post('/buku/bulk-delete', [BukuController::class, 'bulkDelete'])
    ->name('buku.bulk-delete');    

Route::get('/buku/export', [BukuController::class, 'export'])
    ->name('buku.export');

Route::get('/buku/{id}', [BukuController::class, 'show'])
    ->name('buku.show');

Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])
    ->name('buku.edit');

Route::put('/buku/{id}', [BukuController::class, 'update'])
    ->name('buku.update');

Route::delete('/buku/{id}', [BukuController::class, 'destroy'])
    ->name('buku.destroy');



/*
|--------------------------------------------------------------------------
| Anggota
|--------------------------------------------------------------------------
*/

Route::get('/anggota', [AnggotaController::class, 'index'])
    ->name('anggota.index');

Route::get('/anggota/{id}', [AnggotaController::class, 'show'])
    ->name('anggota.show');

Route::get('/anggota/create', function () {
    return 'Tambah Anggota';
})->name('anggota.create');

Route::get('/anggota/{id}/edit', function ($id) {
    return "Edit Anggota ID: $id";
})->name('anggota.edit');

Route::delete('/anggota/{id}', function ($id) {
    return "Hapus Anggota ID: $id";
})->name('anggota.destroy');