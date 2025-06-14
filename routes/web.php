<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ListProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/list', function () {
    return view('list_product');
});
Route::get('/home', function () {
    return view('pages.home');
});
Route::get('/listproduk', [ListProdukController::class, 'show']);
Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');
Route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])->name('produk.delete');
Route::put('/listproduk/{id}', [ListProdukController::class, 'update'])->name('produk.update');