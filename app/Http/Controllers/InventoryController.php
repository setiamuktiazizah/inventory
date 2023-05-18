<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(){
        return view('index');
    }

    public function dashboardAdminPage(){
        return view('dashboard-admin');
    }

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

}
