<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\api\v1\ItemController;
use App\Http\Controllers\api\v1\AddItemController;
use App\Http\Controllers\api\v1\ReduceItemController;
use App\Http\Controllers\api\v1\LoanRequestController;
use App\Http\Controllers\api\v1\ReturnItemController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
// use App\Http\Controllers\Api\RegisterController;
// use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\AddItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

// ========== GENERAL ==============

Route::get('/', [InventoryController::class, 'index']);
Route::get('/dashboard', [InventoryController::class, 'dashboardPage']);


// ========== AUTHENTICATION & USER ==============
// includes /register, /login

Auth::routes();

Route::get('/profil', [InventoryController::class, 'profilPage']);
Route::post('/profil', [UserController::class, 'update']);

Route::get('/reset-password', [InventoryController::class, 'resetPasswordPage']);

Route::group(['middleware' => ['auth']], function () {

    //view by periode
    Route::post('/pengadaan-barang/periode', [InventoryController::class, 'pengadaanBarangPeriode']);
    Route::post('/pengurangan-barang/periode', [InventoryController::class, 'penguranganBarangPeriode']);
    Route::post('/pengajuan-peminjaman/periode', [InventoryController::class, 'pengajuanPeminjamanPeriode']);
    Route::post('/peminjaman/periode', [InventoryController::class, 'peminjamanPeriode']);
    Route::post('/pengembalian/periode', [InventoryController::class, 'pengembalianPeriode']);

    //export pdf
    Route::get('/pengadaan/pdf', [InventoryController::class, 'pengadaanPDF']);
    Route::get('/pengurangan/pdf', [InventoryController::class, 'penguranganPDF']);
    Route::get('/pengajuan/pdf', [InventoryController::class, 'pengajuanPDF']);
    Route::get('/peminjaman/pdf', [InventoryController::class, 'peminjamanPDF']);
    Route::get('/pengembalian/pdf', [InventoryController::class, 'pengembalianPDF']);

    Route::get('/pengadaan/pdf/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'pengadaanPeriodePDF']);
    Route::get('/pengurangan/pdf/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'penguranganPeriodePDF']);
    Route::get('/pengajuan/pdf/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'pengajuanPeriodePDF']);
    Route::get('/peminjaman/pdf/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'peminjamanPeriodePDF']);
    Route::get('/pengembalian/pdf/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'pengembalianPeriodePDF']);

    //export excel
    Route::get('/pengadaan/excel', [InventoryController::class, 'pengadaanExcel']);
    Route::get('/pengurangan/excel', [InventoryController::class, 'penguranganExcel']);
    Route::get('/pengajuan/excel', [InventoryController::class, 'pengajuanExcel']);
    Route::get('/peminjaman/excel', [InventoryController::class, 'peminjamanExcel']);
    Route::get('/pengembalian/excel', [InventoryController::class, 'pengembalianExcel']);

    Route::get('/pengadaan/excel/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'pengadaanPeriodeExcel']);
    Route::get('/pengurangan/excel/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'penguranganPeriodeExcel']);
    Route::get('/pengajuan/excel/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'pengajuanPeriodeExcel']);
    Route::get('/peminjaman/excel/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'peminjamanPeriodeExcel']);
    Route::get('/pengembalian/excel/{tgl_awal}/{tgl_akhir}', [InventoryController::class, 'pengembalianPeriodeExcel']);

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/edit-akun', [InventoryController::class, 'editAkunPage']);
    Route::post('/edit-akun', [InventoryController::class, 'editAkun']);

    Route::get('/manajemen-user', [UserController::class, 'index']);
    Route::get('/manajemen-user/{id}', [UserController::class, 'edit']);
    Route::post('/manajemen-user/{id}', [UserController::class, 'update']);


    // ========== ITEM ==============

    Route::get('/data-barang', [ItemController::class, 'index']);
    Route::get('/edit-barang/{item}', [ItemController::class, 'edit']);
    Route::put('/update-barang/{item}', [ItemController::class, 'update']);


    // ========== ADD ITEM ==============

    Route::get('/pengadaan-barang', [AddItemController::class, 'index'])->name('pengadaan-barang');
    Route::get('/tambah-pengadaan', [AddItemController::class, 'create']);
    Route::post('/pengadaan-barang', [AddItemController::class, 'store'])->name('pengadaan-barang.store');
    Route::get('/pengadaan-barang/{addItem}', [AddItemController::class, 'edit'])->name('pengadaan-barang.edit');
    Route::post('/pengadaan-barang/{addItem}/store', [AddItemController::class, 'update'])->name('pengadaan-barang.update');


    // ========== REDUCE ITEM ==============

    Route::get('/pengurangan-barang', [ReduceItemController::class, 'index']);
    Route::get('/tambah-pengurangan', [ReduceItemController::class, 'create']);
    Route::post('/simpan-pengurangan', [ReduceItemController::class, 'store']);
    Route::get('/edit-pengurangan/{reduceItem}', [ReduceItemController::class, 'edit']);
    Route::put('/update-pengurangan/{reduceItem}', [ReduceItemController::class, 'update']);


    // ========== LOAN REQUEST ==============

    Route::get('/peminjaman-user', [LoanRequestController::class, 'index']);
    Route::get('/pengajuan-peminjaman-operator', [LoanRequestController::class, 'view']);

    Route::get('/ubah-status/{loanRequest}', [LoanRequestController::class, 'edit']);
    Route::put('/ubah-status-update/{loanRequest}', [LoanRequestController::class, 'update']);

    Route::get('/peminjaman-1', [LoanRequestController::class, 'createStep1']);
    Route::post('/peminjaman-2', [LoanRequestController::class, 'createStep2']);
    Route::post('/peminjaman-2-remove', [LoanRequestController::class, 'createStep2Remove']);
    Route::post('/peminjaman-3', [LoanRequestController::class, 'createStep3']);
    Route::post('/peminjaman-3-add', [LoanRequestController::class, 'createStep3Add']);
    Route::post('/peminjaman-4', [LoanRequestController::class, 'createStep4']);
    Route::post('/peminjaman-end', [LoanRequestController::class, 'store']);

    Route::get('/peminjaman-edit', [InventoryController::class, 'peminjamanEdit']);


    // ========== LOAN ITEM ==============

    Route::get('/peminjaman-operator', [LoanRequestController::class, 'index']);


    // ========== RETURN ITEM ==============

    Route::get('/pengembalian-operator', [ReturnItemController::class, 'index']);
    Route::get('/tambah-pengembalian', [ReturnItemController::class, 'create']);
    Route::post('/tambah-pengembalian', [ReturnItemController::class, 'store']);
});
