<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
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

Route::get('/', function () {
    return view('Layout.App');
});
Route::get('/home', function () {
    return view('pages.home');
});
Route::get('/add_cart/{article}',[CartController::class, 'add_cart'])->name('add_cart');
Route::get('/show_cart/', [CartController::class, 'show_cart'])->name('show_cart');
Route::get('/vider_cart/', [CartController::class, 'vider_cart'])->name('vider_cart');
Route::get('/inc_cart/{article}', [CartController::class, 'inc_cart'])->name('inc_cart');
Route::get('/dec_cart/{article}', [CartController::class, 'dec_cart'])->name('dec_cart');
Route::delete('/remove_cart/{article}', [CartController::class, 'remove_cart'])->name('remove_cart');
Route::resource('articles', ArticleController::class);
