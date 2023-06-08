<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;

class InventoryController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function dashboardAdminPage()
    {
        return view('dashboard-admin');
    }

    public function loginPage()
    {
        return view('login');
    }

    public function dashboardOperatorPage()
    {
        return view('dashboard-operator');
    }

    public function dashboardPeminjamPage()
    {
        return view('dashboard-peminjam');
    }

    public function peminjamanPengembalianPage()
    {
        return view('peminjaman-pengembalian');
    }

    public function dataBarangPage()
    {

        return view('data-barang');
    }

    public function pengadaanBarangPage()
    {
        return view('pengadaan-barang');
    }

    public function penguranganBarangPage()
    {
        return view('pengurangan-barang');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function profilPage()
    {
        return view('profil');
    }

    public function manajemenUserPage()
    {
        return view('manajemen-user');
    }

    public function resetPasswordPage()
    {
        return view('reset-password');
    }

    public function laporanPengadaanPage()
    {
        return view('laporan-pengadaan-barang');
    }

    public function laporanPenguranganPage()
    {
        return view('laporan-pengurangan-barang');
    }
  
    public function laporanPeminjamanPengembalianOperatorPage()
    {
        return view('laporan-peminjaman-pengembalian-operator');
    }

    public function peminjamanUserPage()
    {
        return view('peminjaman-user');
    }

    public function dashboardPage(){
        return view('dashboard');
    }

    public function pengajuanPeminjamanPage()
    {
        return view('pengajuan-peminjaman-operator');
    }

    public function peminjamanOperatorPage()
    {
        return view('peminjaman-operator');
    }

    public function pengembalianOperatorPage()
    {
        return view('pengembalian-operator');
    }

    public function peminjaman1Page()
    {
        return view('peminjaman-1');
    }

    public function peminjaman2Page()
    {
        return view('peminjaman-2');
    }

    public function peminjaman3Page()
    {
        return view('peminjaman-3');
    }

    public function peminjamanEdit()
    {
        return view('peminjaman-edit');
    }

    public function ubahStatusPage()
    {
        return view('ubah-status');
    }
}