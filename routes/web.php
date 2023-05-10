<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\registrasiController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', [loginController::class, 'index']);
Route::post('/', [loginController::class, 'authenticate']);
Route::get('/logout', [loginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
Route::get('/registrasi', [registrasiController::class, 'index']);
Route::post('/registrasi', [registrasiController::class, 'store']);

Route::resource('/dashboard/produk', ProductController::class)->middleware('auth');
Route::get('/dashboard/produk', [ProductController::class, 'search'])->name('produk')->middleware('auth');

Route::get('/dashboard/transaksi', [TransaksiController::class, 'index'])->middleware('auth');
Route::get('/dashboard/transaksi', [TransaksiController::class, 'search'])->name('transaksi.search')->middleware('auth');
