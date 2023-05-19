<?php

use App\Http\Controllers\api\v1\AddItemController;
use App\Http\Controllers\api\v1\ReduceItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
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
<<<<<<< Updated upstream

<<<<<<< HEAD
=======
=======
>>>>>>> Stashed changes
Route::get('/', [InventoryController::class,'index']);

<<<<<<< HEAD
Route::get('/loginPage', [InventoryController::class, 'loginPage']);

Route::get('/dashboard-admin', [InventoryController::class, 'dashboardAdminPage']);

Route::get('/dashboard-operator', [InventoryController::class, 'dashboardOperatorPage']);

Route::get('/peminjaman-pengembalian', [InventoryController::class, 'peminjamanPengembalianPage']);
=======
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
Route::get('/dashboard-admin', [InventoryController::class, 'dashboardAdminPage']);

Route::get('/data-barang', [InventoryController::class, 'dataBarangPage']);

Route::get('/pengadaan-barang', [AddItemController::class, 'index']);

Route::get('/pengurangan-barang', [ReduceItemController::class, 'index']);

// Route::get('/login', [InventoryController::class, 'loginPage']);

Route::get('/register', [InventoryController::class, 'registerPage']);

Route::get('/profil', [InventoryController::class, 'profilPage']);

Route::get('/manajemen-user', [InventoryController::class, 'manajemenUserPage']);

Route::get('/reset-password', [InventoryController::class, 'resetPasswordPage']);
>>>>>>> 094d009818aa62b779a29177a71530df5dae3747

<<<<<<< Updated upstream
<<<<<<< HEAD
Route::get('/', [InventoryController::class, 'index']);
=======
>>>>>>> d8209e76a2eaced5662b969ede07012d601a8cd6
=======
Route::get('/laporan-pengadaan-barang', [InventoryController::class, 'laporanPengadaanPage']);

Route::get('/laporan-pengurangan-barang', [InventoryController::class, 'laporanPenguranganPage']);
>>>>>>> Stashed changes
