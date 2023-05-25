<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;


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

Route::get('/data-barang', [InventoryController::class, 'dataBarangPage']);

Route::get('/pengadaan-barang', [InventoryController::class, 'pengadaanBarangPage']);

Route::get('/pengurangan-barang', [InventoryController::class, 'penguranganBarangPage']);

Route::get('/login', [LoginController::class, 'loginPage']);
Route::post('/login', [LoginController::class, '__invoke']);

Route::get('/register', [InventoryController::class, 'registerPage']);
Route::post('/register', [RegisterController::class, '__invoke']);

Route::get('/profil', [InventoryController::class, 'profilPage']);

Route::get('/manajemen-user', [InventoryController::class, 'manajemenUserPage']);

Route::get('/reset-password', [InventoryController::class, 'resetPasswordPage']);
