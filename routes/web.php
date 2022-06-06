<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AlamatPengirimanController;
use App\Http\Controllers\KonfirmasiController;
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

Route::get('/', [PagesController::class,'home']);
Route::get('/menu', [PagesController::class,'menu']);
Route::get('/about', [PagesController::class,'about']);
Route::get('/location', [PagesController::class,'location']);
Route::get('/profile', [PagesController::class,'profile']);
Route::get('/payment', [PagesController::class,'payment']);
Route::get('/custom', [PagesController::class,'custom']);




Route::get('/register', [AuthController::class,'register']);
Route::post('/register/check', [AuthController::class,'doRegister']);

Route::get('/login', [AuthController::class,'login']);
Route::post('/login/check', [AuthController::class,'doLogin']);
Route::get('/login/success', [AuthController::class,'successlogin']);
Route::get('/logout', [AuthController::class,'logout']);

Route::get('/registercs', [AuthController::class,'register']);
Route::post('/registercs/check', [AuthController::class,'doRegister']);

Route::get('/logincs', [AuthController::class,'login']);
Route::post('/logincs/check', [AuthController::class,'doLogin']);
Route::get('/logincs/success', [AuthController::class,'successlogin']);
Route::get('/logout', [AuthController::class,'logout']);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [ProductController::class, 'productList'])->name('products.list');
// cart
Route::resource('/cart', 'CartController');
Route::patch('kosongkan/{id}', 'CartController@kosongkan');
// cart detail
Route::resource('/cartdetail', 'CartDetailController');
// alamat pengiriman
Route::resource('alamatpengiriman', 'AlamatPengirimanController');
// checkout
Route::get('/checkout', 'CartController@checkout');
Route::get('/payment', 'CartController@payment');
  // route transaksi
  Route::resource('transaksi', 'TransaksiController');
  Route::get('/myorder', 'TransaksiController@index');
  Route::get('/tracking', 'TransaksiController@show');
    // route transaksi
Route::resource('konfirmasi', 'KonfirmasiController');
Route::get('/waiting', 'KonfirmasiController@store');
Route::resource('pengiriman', 'PengirimanController');
 // form laporan
  Route::get('laporan', 'LaporanController@index');
  // proses laporan
  Route::get('/laporan/proses', 'LaporanController@proses');
  Route::get('/laporan/proses_pdf', 'LaporanController@cetak_pdf');


Route::get('product/{product}', [ProductController::class, 'shows'])->name('shows');
Route::get('sofa', [ProductController::class, 'sofa'])->name('sofa');
Route::get('terrace', [ProductController::class, 'terrace'])->name('terrace');
Route::get('dining', [ProductController::class, 'dining'])->name('dining');
Route::get('daybed', [ProductController::class, 'daybed'])->name('daybed');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('roles', \RoleController::class);
    Route::resource('users', \UserController::class);
    Route::resource('products', \ProductController::class);
    Route::resource('kategori', \KategoriController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




