<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'hello'])->name('dashboard');
Route::get('/banner', [AdminController::class, 'banner'])->name('banner');
Route::get('/addbanner', [AdminController::class, 'addbanner'])->name('addbanner');
Route::post('/prosesAddBanner', [AdminController::class, 'prosesAddBanner'])->name('prosesAddBanner');
Route::get('/deleteBanner', [AdminController::class, 'deleteBanner'])->name('deleteBanner');
Route::get('/update', [AdminController::class, 'update'])->name('update');
Route::post('/prosesUpdateBanner/{id}', [AdminController::class, 'prosesUpdateBanner'])->name('prosesUpdateBanner');
