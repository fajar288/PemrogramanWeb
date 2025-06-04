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