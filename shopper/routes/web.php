<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HoaDonBanController;
use App\Http\Controllers\HoaDonNhapController;
use App\Http\Controllers\LoaiController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/sanpham/index', [SanPhamController::class, 'index'])->name('sp');
Route::get('/sanpham/add', [SanPhamController::class, 'add'])->name('themsp');
Route::post('/sanpham/add', [SanPhamController::class, 'addSP'])->name('addsp');
Route::get('/sanpham/size/{id}/{hdn}', [SanPhamController::class, 'size'])->name('size');
Route::post('/sanpham/size/{id}/{hdn}', [SanPhamController::class, 'addSize'])->name('addsize');
Route::get('/sanpham/update/{id}', [SanPhamController::class, 'update'])->name('updatesp');
Route::post('/sanpham/update/{id}', [SanPhamController::class, 'updateSP'])->name('updatesanpham');
Route::get('/sanpham/updatesl/{id}', [SanPhamController::class, 'updatesl'])->name('updatesl');
Route::post('/sanpham/updatesl/{id}', [SanPhamController::class, 'updateSLs'])->name('updateSLs');
Route::get('/sanpham/themsize/{id}', [SanPhamController::class, 'themsize'])->name('themsize');
Route::post('/sanpham/themsize/{id}', [SanPhamController::class, 'themsizes'])->name('themsizes');
Route::post('/sanpham/search', [SanPhamController::class, 'searchSP'])->name('searchSP');

Route::get('/loai/index', [LoaiController::class, 'index'])->name('loai');
Route::get('/loai/update/{id}', [LoaiController::class, 'update'])->name('updateloai');
Route::post('/loai/update/{id}', [LoaiController::class, 'updateLoai'])->name('updateLoais');
Route::get('/loai/delete/{id}', [LoaiController::class, 'delete'])->name('deleteloai');
Route::get('/loai/add', [LoaiController::class, 'add'])->name('addloai');
Route::post('/loai/add', [LoaiController::class, 'addLoai'])->name('addLoais');
Route::post('/loai/search', [LoaiController::class, 'searchLoai'])->name('searchLoai');

Route::get('/size/index', [SizeController::class, 'index'])->name('s');
Route::get('/size/update/{id}', [SizeController::class, 'update'])->name('updateS');
Route::post('/size/update/{id}', [SizeController::class, 'updateSize'])->name('updateSs');
Route::get('/size/delete/{id}', [SizeController::class, 'delete'])->name('deletelS');
Route::get('/size/add', [SizeController::class, 'add'])->name('addS');
Route::post('/size/add', [SizeController::class, 'addSize'])->name('adds');
Route::post('/size/search', [SizeController::class, 'searchSize'])->name('searchSize');
Route::get('/user/index', [SizeController::class, 'user'])->name('user');
Route::post('/user/search', [SizeController::class, 'searchuser'])->name('searchuser');

Route::get('/hdb/index', [HoaDonBanController::class, 'index'])->name('hdb');
Route::get('/hdb/cthdb/{id}', [HoaDonBanController::class, 'cthdb'])->name('cthdb');
Route::post('/hdb/search', [HoaDonBanController::class, 'searchHDB'])->name('searchhdb');
Route::get('/hdn/index', [HoaDonNhapController::class, 'hdn'])->name('hdn');
Route::get('/hdn/cthdn/{id}', [HoaDonNhapController::class, 'cthdn'])->name('cthdn');

Route::get('/hdb/hdbuser', [HoaDonBanController::class, 'HDBuser'])->name('hdbuser');
Route::get('/hdb/hdbuser/{id}', [HoaDonBanController::class, 'delete'])->name('deleterhdbuser');
Route::get('/hdb/updateTH/{id}', [HoaDonBanController::class, 'updateTH'])->name('updateTH');

Route::get('/thongke', [HoaDonBanController::class, 'thongke'])->name('thongke');
Route::post('/thongke', [HoaDonBanController::class, 'thongkePost'])->name('thongkePost');

Route::get('/change', [UserController::class, 'change'])->name('change');
Route::post('/change', [UserController::class, 'changePassword'])->name('changePassword');

Route::get('/danhgia', [HoaDonBanController::class, 'danhgia'])->name('danhgia');
Route::post('/danhgia', [HoaDonBanController::class, 'danhgiaPost'])->name('danhgiaPost');
Route::get('/dg', [HoaDonBanController::class, 'dg'])->name('dg');
Route::get('/updatedg/{id}', [HoaDonBanController::class, 'updatedg'])->name('updatedg');
Route::get('/deletedg/{id}', [HoaDonBanController::class, 'deletedg'])->name('deletedg');

Route::get('/shopper/index',[BackendController::class,'index'])->name('index');
Route::get('/shopper/category/{id}',[BackendController::class,'category'])->name('categories');
Route::get('/shopper/details/{id}',[BackendController::class,'details'])->name('details');
Route::get('/shopper/register',[UserController::class,'register'])->name('register');
Route::post('/shopper/register',[UserController::class,'addRegister'])->name('addregister');
Route::get('/shopper/login',[UserController::class,'login'])->name('login');
Route::get('/shopper/logout',[UserController::class,'logout'])->name('logout');
Route::post('/shopper/login',[UserController::class,'postLogin'])->name('postlogin');
Route::get('/shopper/search',[BackendController::class,'search'])->name('search');
Route::get('/shopper/cart',[CartController::class,'show_cart'])->name('cart');
Route::post('/shopper/cart',[CartController::class,'save_cart'])->name('save_cart');
Route::get('/shopper/delete_cart/{id}',[CartController::class,'delete_cart'])->name('delete_cart');
Route::post('/shopper/order',[CartController::class,'order'])->name('order');

//add-to-cart jquery ajax
Route::get('/shopper/add-cart/{id}',[CartController::class,'addcart'])->name('add-cart');
Route::get('/shopper/update-cart',[CartController::class,'updatecart'])->name('update-cart');
Route::post('/shopper/add-cart-details/{id}',[CartController::class,'addcartDetails'])->name('add-cart-details');
Route::get('/shopper/delete-cart',[CartController::class,'deletecart'])->name('delete-cart');

//forget password
Route::get('/shopper/forget',[UserController::class,'forget'])->name('forget');
Route::post('/shopper/forgetPost',[UserController::class,'forgetPost'])->name('forgetPost');
Route::get('/shopper/active/{id}/{token}',[UserController::class,'getpassword'])->name('getpassword');
Route::post('/shopper/active/{id}',[UserController::class,'activePassword'])->name('activePassword');

// in hóa đơn pdf
Route::get('/hdb/pdf/{id}',[HoadonbanController::class,'pdf'])->name('pdf');