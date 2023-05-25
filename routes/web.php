<?php

use App\Http\Controllers\api\v1\AddItemController;
use App\Http\Controllers\api\v1\ReduceItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;

use Illuminate\Http\Request;

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

Route::get('/', [InventoryController::class, 'index']);

Route::get('/dashboard-admin', [InventoryController::class, 'dashboardAdminPage']);

Route::get('/dashboard-operator', [InventoryController::class, 'dashboardOperatorPage']);

Route::get('/dashboard-peminjam', [InventoryController::class, 'dashboardPeminjamPage']);

Route::get('/peminjaman-pengembalian', [InventoryController::class, 'peminjamanPengembalianPage']);

Route::get('/data-barang', [InventoryController::class, 'dataBarangPage']);

Route::get('/pengadaan-barang', [AddItemController::class, 'index']);

Route::get('/pengurangan-barang', [ReduceItemController::class, 'index']);


Route::get('/login', [LoginController::class, 'loginPage']);
Route::post('/login', [LoginController::class, '__invoke']);

Route::get('/login', [InventoryController::class, 'loginPage']);

Route::get('/register', [InventoryController::class, 'registerPage']);

Route::get('/profil', [InventoryController::class, 'profilPage']);

Route::get('/manajemen-user', [InventoryController::class, 'manajemenUserPage']);

Route::get('/reset-password', [InventoryController::class, 'resetPasswordPage']);


Route::get('/', [InventoryController::class, 'index']);

Route::get('/laporan-pengadaan-barang', [InventoryController::class, 'laporanPengadaanPage']);

Route::get('/laporan-pengurangan-barang', [InventoryController::class, 'laporanPenguranganPage']);


Route::get('/', [InventoryController::class, 'index']);

Route::get('/laporan-pengadaan-barang', [InventoryController::class, 'laporanPengadaanPage']);

Route::get('/laporan-pengurangan-barang', [InventoryController::class, 'laporanPenguranganPage']);

Route::get('/laporan-peminjaman-pengembalian-operator', [InventoryController::class, 'laporanPeminjamanPengembalianOperatorPage']);

Route::get('/peminjaman-user', [InventoryController::class, 'peminjamanUserPage']);