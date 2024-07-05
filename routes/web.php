<?php

use App\Http\Controllers\JasaPengirimanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatusController;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('produk', ProdukController::class);
Route::resource('/dashboard/orders', PesananController::class);
Route::resource('/dashboard/payments', PembayaranController::class);
Route::resource('/dashboard/deliveries', PengirimanController::class);
Route::resource('/dashboard/products', ProdukController::class);
Route::resource('/dashboard/users', PenggunaController::class);
Route::resource('/dashboard/delivery-services', JasaPengirimanController::class);
Route::resource('/dashboard/categories', KategoriController::class);
Route::resource('/dashboard/statuses', StatusController::class);

Route::get('/isCartExists', [PesananController::class, 'isCartExists']);
Route::post('addCartQty', [PesananController::class, 'addCartQty']);
Route::post('minCartQty', [PesananController::class, 'minCartQty']);
Route::post('delCart', [PesananController::class, 'delCart']);
Route::get('/cart', [PesananController::class, 'getCarts']);
Route::get('/orders', [PesananController::class, 'getOrders']);
Route::post('checkout', [PembayaranController::class, 'checkout']);
Route::post('updStatus', [PembayaranController::class, 'updStatus']);

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
Route::get('/menu', function (Request $request) {
    $kategori = $request->get('kategori') !== null ? $request->get('kategori') : '';
    $nama = $request->get('nama') !== null ? $request->get('nama') : '';
    return view('menu', [
        'categories' => Kategori::query()->get(),
        'products' => Produk::query()->where('kode_kategori', 'LIKE',  "$kategori%")->where('nama', 'LIKE', "%$nama%")->get(),
        'selected' => $kategori,
    ]);
});
Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});
Route::get('/profile', function () {
    $pengguna = Pengguna::query()->where('email', session('userEmail'))->first();
    return view('profile', ['title' => 'Profile', 'pengguna' => $pengguna]);
});
Route::get('/change-profile', function () {
    $pengguna = Pengguna::query()->where('email', session('userEmail'))->first();
    return view('change-profile', ['title' => 'Change Profile', 'pengguna' => $pengguna]);
});
Route::post('/change-profile', [PenggunaController::class, 'changeProfile']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::resource('register', RegisterController::class)->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard.index', ['title' => 'Dashboard']);
});
