<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;
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
Route::get('/daftar/{id}/formdaftar', [App\Http\Controllers\HomeController::class, 'formdaftar']);
Route::post('/storedaftar', [App\Http\Controllers\HomeController::class, 'storedaftar']);

Route::get('/admin', function () {
    return view('pages.auth.loginadmin');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('home', function () {
    //     return view('pages.dashboard');
    // })->name('home');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');

    Route::resource('user', UserController::class);
    Route::resource('produk', ProdukController::class);
    Route::get('/webinar', [App\Http\Controllers\HomeController::class, 'webinar']);
    Route::get('/peserta/{id}/lihatpeserta', [App\Http\Controllers\HomeController::class, 'lihatpeserta']);
    Route::get('/peserta/{id}/updatepembayaran', [App\Http\Controllers\HomeController::class, 'updatepembayaran']);
    Route::post('/updatepembayaran', [App\Http\Controllers\HomeController::class, 'storeupdatepembayaran']);
});
