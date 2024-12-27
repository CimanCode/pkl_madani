<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AdminController::class, 'index']);
Route::get('/hello', [AdminController::class, 'hello'])->name('dashboard');
Route::get('/banner', [AdminController::class, 'banner'])->name('banner');
Route::get('/addbanner', [AdminController::class, 'addbanner'])->name('addbanner');
