<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;

use App\Models\AddItem;
use App\Models\ReduceItem;
use App\Models\Item;
use App\Models\LoanRequest;
use App\Models\LoanItem;
use App\Models\ReturnItem;

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
        $jumlah_addItem = AddItem::latest()->get()->count();
        $jumlah_reduceItem = ReduceItem::latest()->get()->count();
        $jumlah_item = Item::latest()->get()->count();
        $jumlah_ajuan = LoanRequest::latest()->get()->count();
        $jumlah_dipinjam = LoanItem::latest()->get()->count();
        $jumlah_kembali = ReturnItem::latest()->get()->count();

        return view('dashboard', [
            'jumlah_addItem' => $jumlah_addItem,
            'jumlah_reduceItem' => $jumlah_reduceItem,
            'jumlah_item' => $jumlah_item,
            'jumlah_ajuan' => $jumlah_ajuan,
            'jumlah_dipinjam' => $jumlah_dipinjam,
            'jumlah_kembali' => $jumlah_kembali
        ]);
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

    public function editAkunPage()
    {
        return view('edit-akun');
    }

    public function editAkun(Request $request)
    {
        $this->validate($request, [
            'no_hp' => 'required',
        ]);

        $email = Auth::user()->email;
        $user = User::where('email', $email)->first();

        if ($user != NULL) {
            $user->update(['no_hp' => $request->no_hp]);
        }

        return redirect('/profil');
    }

    public function manajemenUserEditPage()
    {
        return view('manajemen-user-edit');
    }

    public function tambahPengadaanPage()
    {
        return view('tambah-pengadaan');
    }

    public function editPengadaanPage()
    {
        return view('edit-pengadaan');
    }

    public function tambahPenguranganPage()
    {
        return view('tambah-pengurangan');
    }

    public function editPenguranganPage()
    {
        return view('edit-pengurangan');
    }

    public function editBarangPage()
    {
        return view('edit-barang');
    }

    public function tambahPengembalianPage()
    {
        return view('tambah-pengembalian');
    }
