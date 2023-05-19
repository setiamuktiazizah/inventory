<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(){
        return view('index');
    }

<<<<<<< HEAD
    public function loginPage(){
        return view('loginPage');
    }
    
=======
>>>>>>> 094d009818aa62b779a29177a71530df5dae3747
    public function dashboardAdminPage(){
        return view('dashboard-admin');
    }

<<<<<<< HEAD
    public function dashboardOperatorPage(){
        return view('dashboard-operator');
    }

    public function peminjamanPengembalianPage(){
        return view('peminjaman-pengembalian');
    }

}
=======
    public function dataBarangPage(){
        return view('data-barang');
    }

    public function pengadaanBarangPage(){
        return view('pengadaan-barang');
    }

    public function penguranganBarangPage(){
        return view('pengurangan-barang');
    }

    public function loginPage(){
        return view('login');
    }

    public function registerPage(){
        return view('register');
    }

    public function profilPage(){
        return view('profil');
    }

    public function manajemenUserPage(){
        return view('manajemen-user');
    }

    public function resetPasswordPage(){
        return view('reset-password');
    }

    public function laporanPengadaanPage(){
        return view('laporan-pengadaan-barang');
    }

    public function laporanPenguranganPage(){
        return view('laporan-pengurangan-barang');
    }

}
>>>>>>> 094d009818aa62b779a29177a71530df5dae3747
