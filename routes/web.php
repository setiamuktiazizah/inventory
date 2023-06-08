<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\api\v1\ItemController;
use App\Http\Controllers\api\v1\AddItemController;
use App\Http\Controllers\api\v1\ReduceItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

// use App\Http\Controllers\Api\RegisterController;
// use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('additem', [
  
  
  Controller::class, 'index']);

Route::get('/', [InventoryController::class, 'index']);

Auth::routes();

Route::get('/reset-password', [InventoryController::class, 'resetPasswordPage']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard-admin', [InventoryController::class, 'dashboardAdminPage']);

    Route::get('/dashboard-operator', [InventoryController::class, 'dashboardOperatorPage']);


    Route::get('/dashboard-peminjam', [InventoryController::class, 'dashboardPeminjamPage']);

    Route::get('/pengadaan-barang', [AddItemController::class, 'index'])->name('pengadaan-barang');
    Route::post('/pengadaan-barang', [AddItemController::class, 'store'])->name('pengadaan-barang.store');
    Route::get('/pengadaan-barang/{addItem}', [AddItemController::class, 'edit'])->name('pengadaan-barang.edit');
    Route::post('/pengadaan-barang/{addItem}/store', [AddItemController::class, 'update'])->name('pengadaan-barang.update');
// Route::resource('/addItem', [AddItemController::class]);


    Route::get('/peminjaman-pengembalian', [InventoryController::class, 'peminjamanPengembalianPage']);

    Route::get('/data-barang', [ItemController::class, 'index']);

    // Route::get('/login', [LoginController::class, 'showLoginForm']);
    // Route::post('/login', [LoginController::class, 'validateLogin']);
  
  
//     Route::get('/pengadaan-barang', [AddItemController::class, 'index'])->name('pengadaan-barang');

    Route::get('/pengurangan-barang', [ReduceItemController::class, 'index']);

    Route::get('/profil', [InventoryController::class, 'profilPage']);

    Route::get('/manajemen-user', [UserController::class, 'index']);
    Route::get('/manajemen-user/{id}/edit', 'UserController@update')->name('manajemen-user.update');
    Route::post('/manajemen-user/{id}', 'UserController@edit')->name('manajemen-user.edit');



    Route::get('/laporan-pengadaan-barang', [InventoryController::class, 'laporanPengadaanPage']);

    Route::get('/laporan-pengurangan-barang', [InventoryController::class, 'laporanPenguranganPage']);

    Route::get('/laporan-peminjaman-pengembalian-operator', [InventoryController::class, 'laporanPeminjamanPengembalianOperatorPage']);

    Route::get('/peminjaman-user', [InventoryController::class, 'peminjamanUserPage']);
});




// Route::get('/login', [LoginController::class, 'loginPage']);
// Route::post('/login', [LoginController::class, '__invoke']);

//Route::get('/login', [InventoryController::class, 'loginPage']);

Route::get('/peminjaman-user', [InventoryController::class, 'peminjamanUserPage']);

Route::get('/peminjaman-user', [InventoryController::class, 'peminjamanUserPage']);

Route::get('/dashboard', [InventoryController::class, 'dashboardPage']);


Route::get('/pengajuan-peminjaman', [InventoryController::class, 'pengajuanPeminjamanPage']);


