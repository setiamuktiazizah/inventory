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
        // $name = auth()->guard('api')->user()->name;
        $name = "John Doe";
        return view('dashboard-admin')->with('name', $name);
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

    public function dataBarangPage(Request $request)
    {
        $token = Cookie::get('token');
        $request->header('Accept', 'application/json');
        $request->header('Content-Type', 'application/json');
        $request->header('Authorization', $token);
        $request = Request::create('api/v1/item', 'GET');
        $response = Route::dispatch($request);
        $data = Response::Json(['data' => $response]);
        $data1 = json_decode($data->content(), TRUE);
        return view('data-barang')->with('data', $data1);
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

    public function profilPage(Request $request)
    {

        $token = Cookie::get('token');
        $request->header('Accept', 'application/json');
        $request->header('Content-Type', 'application/json');
        $request->header('Authorization', $token);
        $request = Request::create('api/user', 'GET');
        $response = Route::dispatch($request);
        $data = Response::Json(['data' => $response]);
        $data1 = json_decode($data->content(), TRUE);
        return view('profil')->with('data', $data1);
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
    public function laporanPeminjamanPengembalianOperatorPage(){
        return view('laporan-peminjaman-pengembalian-operator');
    }

    public function peminjamanUserPage(){
        return view('peminjaman-user');
    }
}
