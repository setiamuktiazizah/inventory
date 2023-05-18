<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

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

Route::get('/', [InventoryController::class,'index']);

<<<<<<< HEAD
Route::get('/loginPage', [InventoryController::class, 'loginPage']);

Route::get('/dashboard-admin', [InventoryController::class, 'dashboardAdminPage']);

Route::get('/dashboard-operator', [InventoryController::class, 'dashboardOperatorPage']);

Route::get('/peminjaman-pengembalian', [InventoryController::class, 'peminjamanPengembalianPage']);
=======
Route::get('/dashboard-admin', [InventoryController::class, 'dashboardAdminPage']);

Route::get('/data-barang', [InventoryController::class, 'dataBarangPage']);

Route::get('/pengadaan-barang', [InventoryController::class, 'pengadaanBarangPage']);

Route::get('/pengurangan-barang', [InventoryController::class, 'penguranganBarangPage']);

// Route::get('/login', [InventoryController::class, 'loginPage']);

Route::get('/register', [InventoryController::class, 'registerPage']);

Route::get('/profil', [InventoryController::class, 'profilPage']);

Route::get('/manajemen-user', [InventoryController::class, 'manajemenUserPage']);

Route::get('/reset-password', [InventoryController::class, 'resetPasswordPage']);
>>>>>>> 094d009818aa62b779a29177a71530df5dae3747

