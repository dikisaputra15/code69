<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WarungController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PembayaranController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home/{id}/lihatproduk', [App\Http\Controllers\HomeController::class, 'lihatproduk']);
Route::get('/warung/{id}/pilihwarung', [App\Http\Controllers\WarungController::class, 'pilihwarung']);
Route::get('/kategori/{id}/pilihkategori', [App\Http\Controllers\KategoriController::class, 'pilihkategori']);
Route::get('/kategori/{id}/pilihkategori', [App\Http\Controllers\KategoriController::class, 'pilihkategori']);
Route::get('/meja/{id}/lihatpesanan', [App\Http\Controllers\MejaController::class, 'lihatpesanan']);
Route::get('/keranjang/delker/{id}', [App\Http\Controllers\KeranjangController::class, 'destroykeranjang']);
Route::post('/meja/storepesan', [App\Http\Controllers\MejaController::class, 'storepesan']);
Route::get('/pembayaran/{id}/bayar', [App\Http\Controllers\PembayaranController::class, 'bayar']);
Route::resource('keranjang', KeranjangController::class);
Route::resource('pembayaran', PembayaranController::class);

Route::get('/admin', function () {
    return view('pages.auth.loginadmin');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('home', function () {
    //     return view('pages.dashboard');
    // })->name('home');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
    Route::post('/pdfpenjualan', [App\Http\Controllers\HomeController::class, 'lihatpdf']);

    Route::resource('user', UserController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('warung', WarungController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('meja', MejaController::class);
    Route::get('/transaksi', [App\Http\Controllers\PembayaranController::class, 'transaksi']);
    Route::get('/pesananmasuk', [App\Http\Controllers\PembayaranController::class, 'pesananmasuk']);
    Route::get('/allpesanan', [App\Http\Controllers\PembayaranController::class, 'allpesanan']);
    Route::get('/pesananmasuk/update/{id}', [App\Http\Controllers\PembayaranController::class, 'updatepesananmasuk']);
});
