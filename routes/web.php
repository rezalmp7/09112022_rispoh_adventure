<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagementKategoriController;
use App\Http\Controllers\ManagementProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\TerimaKasihController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');
Route::get('/produk/{id}', [ProdukController::class, 'index'])->name('produk');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/actionLogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
Route::get('/keranjang/store/{id}', [KeranjangController::class, 'store'])->name('keranjangStore');
Route::post('/keranjang/update', [KeranjangController::class, 'update'])->name('keranjangUpdate');
Route::get('/keranjang/destroy/{id}', [KeranjangController::class, 'destroy'])->name('keranjangDestroy');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkoutStore');

Route::get('/terima_kasih', [TerimaKasihController::class, 'index'])->name('terimaKasih');

Route::middleware('auth')->group(function () {
    Route::get('/admin/kategori', [ManagementKategoriController::class, 'index'])->name('adminKategori');
    Route::post('/admin/kategori/store', [ManagementKategoriController::class, 'store'])->name('tambahKategori');
    Route::get('/admin/kategori/getData/{id}', [ManagementKategoriController::class, 'getData'])->name('getDataKategori');
    Route::get('/admin/kategori/getDataAll', [ManagementKategoriController::class, 'getDataAll'])->name('getDataAllKategori');
    Route::post('/admin/kategori/update/{id}', [ManagementKategoriController::class, 'update'])->name('updateKategori');
    Route::get('/admin/kategori/delete/{id}', [ManagementKategoriController::class, 'destroy'])->name('deleteKategori');

    Route::get('/admin/produk', [ManagementProdukController::class, 'index'])->name('adminProduk');
    Route::post('/admin/produk/store', [ManagementProdukController::class, 'store'])->name('tambahProduk');
    Route::get('/admin/produk/getData/{id}', [ManagementProdukController::class, 'getData'])->name('getDataProduk');
    Route::post('/admin/produk/update/{id}', [ManagementProdukController::class, 'update'])->name('updateProduk');
    Route::get('/admin/produk/delete/{id}', [ManagementProdukController::class, 'destroy'])->name('deleteProduk');
    Route::get('/admin/produk/toggleTersedia/{id}', [ManagementProdukController::class, 'toggleTersedia'])->name('toggleTersediaProduk');

    Route::get('/admin/pesanan', [PesananController::class, 'index'])->name('adminPesanan');
    Route::get('/admin/pesanan/print/{id}', [PesananController::class, 'print'])->name('adminPesananPrint');
    Route::get('/admin/pesanan/show/{id}', [PesananController::class, 'show'])->name('adminPesananShow');

    Route::get('/admin/user', [ManagementUserController::class, 'index'])->name('adminUser');
    Route::get('/admin/user/tambah', [ManagementUserController::class, 'create'])->name('adminUserCreate');
    Route::post('/admin/user/store', [ManagementUserController::class, 'store'])->name('adminUserStore');
    Route::get('/admin/user/edit/{id}', [ManagementUserController::class, 'edit'])->name('adminUserEdit');
    Route::post('/admin/user/update/{id}', [ManagementUserController::class, 'update'])->name('adminUserUpdate');
    Route::get('/admin/user/delete/{id}', [ManagementUserController::class, 'destroy'])->name('adminUserDelete');
});