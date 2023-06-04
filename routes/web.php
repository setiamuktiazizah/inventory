<?php

use App\Http\Controllers\api\v1\ItemController;
use App\Http\Controllers\api\v1\AddItemController;
use App\Http\Controllers\api\v1\ReduceItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\api\v1\UserController;

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

Route::get('additem', [AddItemController::class, 'index']);
Route::get('additem/list', [AddItemController::class, 'getAddItem'])->name('additem
.list');

Route::get('/', [InventoryController::class, 'index']);

Route::get('/dashboard-admin', [InventoryController::class, 'dashboardAdminPage']);

Route::get('/dashboard-operator', [InventoryController::class, 'dashboardOperatorPage']);

Route::get('/dashboard-peminjam', [InventoryController::class, 'dashboardPeminjamPage']);

Route::get('/peminjaman-pengembalian', [InventoryController::class, 'peminjamanPengembalianPage']);

Route::get('/data-barang', [ItemController::class, 'index']);

Route::get('/pengadaan-barang', [AddItemController::class, 'index'])->name('pengadaan-barang');

Route::get('/pengurangan-barang', [ReduceItemController::class, 'index']);


Route::get('/login', [LoginController::class, 'loginPage']);
Route::post('/login', [LoginController::class, '__invoke']);

//Route::get('/login', [InventoryController::class, 'loginPage']);

Route::get('/register', [InventoryController::class, 'registerPage']);
Route::post('/register', [RegisterController::class, '__invoke']);

// Route::get('/profil', [InventoryController::class, 'profilPage']);

Route::get('/profil', [InventoryController::class, 'profilPage']);

Route::get('/manajemen-user', [UserController::class, 'index'])->name('manajemen-user');

Route::get('/reset-password', [InventoryController::class, 'resetPasswordPage']);


Route::get('/', [InventoryController::class, 'index']);

Route::get('/laporan-pengadaan-barang', [InventoryController::class, 'laporanPengadaanPage']);

Route::get('/laporan-pengurangan-barang', [InventoryController::class, 'laporanPenguranganPage']);

Route::get('/', [InventoryController::class, 'index']);

Route::get('/laporan-pengadaan-barang', [InventoryController::class, 'laporanPengadaanPage']);

Route::get('/laporan-pengurangan-barang', [InventoryController::class, 'laporanPenguranganPage']);

Route::get('/laporan-peminjaman-pengembalian-operator', [InventoryController::class, 'laporanPeminjamanPengembalianOperatorPage']);
