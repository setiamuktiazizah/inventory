<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(){
        return view('index');
    }

    public function loginPage(){
        return view('loginPage');
    }
    
    public function dashboardAdminPage(){
        return view('dashboard-admin');
    }

    public function dashboardOperatorPage(){
        return view('dashboard-operator');
    }

    public function peminjamanPengembalianPage(){
        return view('peminjaman-pengembalian');
    }

}