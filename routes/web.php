<?php

use App\Http\Controllers\moneyController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// buat nampilin data
Route::get('/', [moneyController::class, "index"])->name('Moneys.index');
// buat ke halaman tambah
Route::get('/Moneys/create', [moneyController::class, "create"])->name('Moneys.create');
// cuat simpan data
Route::post('/Moneys/store', [moneyController::class, "store"])->name('Moneys.store');
// buat ke halaman edit
Route::get('/Moneys/{id}/edit', [moneyController::class, "edit"])->name('Moneys.edit');
// buat simpen perubahan edit
Route::put('/Moneys/{id}', [moneyController::class, "update"])->name('Moneys.update');
// buat delete data
Route::delete('/Moneys/{id}', [moneyController::class, "destory"])->name('Moneys.destory');