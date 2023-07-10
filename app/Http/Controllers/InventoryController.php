<?php

namespace App\Http\Controllers;

use App\Models\AddItem;
use App\Models\Item;
use App\Models\LoanItem;
use App\Models\LoanRequest;
use App\Models\ReduceItem;
use App\Models\ReturnItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use PDF;
use App\Exports\AddItemExport;
use App\Exports\AddItemPeriodeExport;
use App\Exports\ReduceItemExport;
use App\Exports\ReduceItemPeriodeExport;
use App\Exports\LoanRequestExport;
use App\Exports\LoanRequestPeriodeExport;
use App\Exports\LoanItemExport;
use App\Exports\LoanItemPeriodeExport;
use App\Exports\ReturnItemExport;
use App\Exports\ReturnItemPeriodeExport;
use Maatwebsite\Excel\Facades\Excel;



class InventoryController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function pengadaanBarangPeriode(Request $request)
    {
        $tanggal_awal = $request->tgl_awal;
        $tanggal_akhir = $request->tgl_akhir;

        $data = AddItem::where('date', '>=', $tanggal_awal)->where('date', '<=', $tanggal_akhir)->get();
        return view('pengadaan-barang-period')->with('data_addItems', $data)->with('tgl_awal', $tanggal_awal)->with('tgl_akhir', $tanggal_akhir);
    }

    public function penguranganBarangPeriode(Request $request)
    {
        $tanggal_awal = $request->tgl_awal;
        $tanggal_akhir = $request->tgl_akhir;

        $data = ReduceItem::where('date', '>=', $tanggal_awal)->where('date', '<=', $tanggal_akhir)->get();
        return view('pengurangan-barang-period')->with('reduceItems', $data)->with('tgl_awal', $tanggal_awal)->with('tgl_akhir', $tanggal_akhir);
    }

    public function pengajuanPeminjamanPeriode(Request $request)
    {
        $tanggal_awal = $request->tgl_awal;
        $tanggal_akhir = $request->tgl_akhir;

        $data = LoanRequest::where('loan_date', '>=', $tanggal_awal)->where('loan_date', '<=', $tanggal_akhir)->get();
        return view('pengajuan-peminjaman-period')->with('data_loanRequests', $data)->with('tgl_awal', $tanggal_awal)->with('tgl_akhir', $tanggal_akhir);
    }

    public function peminjamanPeriode(Request $request)
    {
        $tanggal_awal = $request->tgl_awal;
        $tanggal_akhir = $request->tgl_akhir;


        $data_loanItem = LoanItem::where('loan_requests.loan_date', '>=', $tanggal_awal)
            ->where('loan_requests.loan_date', '<=', $tanggal_akhir)
            ->leftjoin('loan_requests', 'loan_items.id_loan_request', '=', 'loan_requests.id')
            ->leftjoin('return_items', 'loan_items.id', '=', 'return_items.id_loan_item')
            ->select('return_items.*', 'loan_items.*')
            ->get();


        return view('peminjaman-period')->with('data_loanItem', $data_loanItem)->with('tgl_awal', $tanggal_awal)->with('tgl_akhir', $tanggal_akhir);
    }

    public function pengembalianPeriodePage()
    {
        return view('pengembalian-period');
    }

    public function pengembalianPeriode(Request $request)
    {
        $tanggal_awal = $request->tgl_awal;
        $tanggal_akhir = $request->tgl_akhir;


        $data_returnItem = ReturnItem::where('return_date', '>=', $tanggal_awal)
            ->where('return_date', '<=', $tanggal_akhir)
            ->get();

        return view('pengembalian-period')->with('data_returnItem', $data_returnItem)->with('tgl_awal', $tanggal_awal)->with('tgl_akhir', $tanggal_akhir);
    }

    public function dashboardAdminPage()
    {
        return view('dashboard-admin');
    }

    public function loginPage()
    {
        return view('login');
    }

    public function resetPasswordPage()
    {
        return view('reset-password');
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
        return view('auth.passwords.email');
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


    public function dashboardPage()
    {
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

    public function pengadaanPDF()
    {
        $addItems = AddItem::latest()->get();
        $pdf = PDF::loadview('pengadaan-barang-pdf', ['data_addItems' => $addItems]);
        return $pdf->stream();
    }
    public function pengadaanExcel()
    {
        return Excel::download(new AddItemExport, 'Laporan-Pengadaan-Barang.xlsx');
    }
    public function pengadaanPeriodeExcel($tgl_awal, $tgl_akhir)
    {
        return Excel::download(new AddItemPeriodeExport($tgl_awal, $tgl_akhir), 'Laporan-Pengadaan-Barang-Periode.xlsx');
    }
    public function pengadaanPeriodePDF($tgl_awal, $tgl_akhir)
    {
        $addItems = AddItem::where('date', '>=', $tgl_awal)->where('date', '<=', $tgl_akhir)->get();
        $pdf = PDF::loadview('pengadaan-barang-pdf', ['data_addItems' => $addItems]);
        return $pdf->stream();
    }



    public function penguranganPDF()
    {
        $reduceItems = ReduceItem::latest()->get();
        $pdf = PDF::loadview('pengurangan-barang-pdf', ['reduceItems' => $reduceItems]);
        return $pdf->stream();
    }
    public function penguranganExcel()
    {
        return Excel::download(new ReduceItemExport, 'Laporan-Pengurangan-Barang.xlsx');
    }
    public function penguranganPeriodePDF($tgl_awal, $tgl_akhir)
    {
        $reduceItems = ReduceItem::where('date', '>=', $tgl_awal)->where('date', '<=', $tgl_akhir)->get();
        $pdf = PDF::loadview('pengurangan-barang-pdf', ['reduceItems' => $reduceItems]);
        return $pdf->stream();
    }

    public function penguranganPeriodeExcel($tgl_awal, $tgl_akhir)
    {
        return Excel::download(new ReduceItemPeriodeExport($tgl_awal, $tgl_akhir), 'Laporan-Pengurangan-Barang-Periode.xlsx');
    }

    public function pengajuanPDF()
    {
        $loan_request = LoanRequest::latest()->get();
        $pdf = PDF::loadview('pengajuan-peminjaman-pdf', ['data_loanRequests' => $loan_request]);
        return $pdf->stream();
    }
    public function pengajuanExcel()
    {
        return Excel::download(new LoanRequestExport, 'Laporan-Pengajuan-Peminjaman.xlsx');
    }
    public function pengajuanPeriodePDF($tgl_awal, $tgl_akhir)
    {
        $loan_request = LoanRequest::where('loan_date', '>=', $tgl_awal)->where('loan_date', '<=', $tgl_akhir)->get();
        $pdf = PDF::loadview('pengajuan-peminjaman-pdf', ['data_loanRequests' => $loan_request]);
        return $pdf->stream();
    }

    public function pengajuanPeriodeExcel($tgl_awal, $tgl_akhir)
    {
        return Excel::download(new LoanRequestPeriodeExport($tgl_awal, $tgl_akhir), 'Laporan-Pengajuan-peminjaman-Periode.xlsx');
    }

    public function peminjamanPDF()
    {
        $data_loanItem = LoanItem::leftjoin('loan_requests', 'loan_items.id_loan_request', '=', 'loan_requests.id')
            ->leftjoin('return_items', 'loan_items.id', '=', 'return_items.id_loan_item')
            ->select('return_items.*', 'loan_items.*')
            ->get();

        $pdf = PDF::loadview('peminjaman-pdf', ['data_loanItem' => $data_loanItem]);
        return $pdf->stream();
    }
    public function peminjamanExcel()
    {
        return Excel::download(new LoanItemExport, 'Laporan-Peminjaman.xlsx');
    }
    public function peminjamanPeriodePDF($tgl_awal, $tgl_akhir)
    {
        $data_loanItem = LoanItem::where('loan_requests.loan_date', '>=', $tgl_awal)
            ->where('loan_requests.loan_date', '<=', $tgl_akhir)
            ->leftjoin('loan_requests', 'loan_items.id_loan_request', '=', 'loan_requests.id')
            ->leftjoin('return_items', 'loan_items.id', '=', 'return_items.id_loan_item')
            ->select('return_items.*', 'loan_items.*')
            ->get();

        $pdf = PDF::loadview('peminjaman-pdf', ['data_loanItem' => $data_loanItem]);
        return $pdf->stream();
    }

    public function peminjamanPeriodeExcel($tgl_awal, $tgl_akhir)
    {
        return Excel::download(new LoanItemPeriodeExport($tgl_awal, $tgl_akhir), 'Laporan-peminjaman-Periode.xlsx');
    }
    public function pengembalianPDF()
    {
        $data_returnItem = ReturnItem::latest()
            ->get();

        $pdf = PDF::loadview('pengembalian-pdf', ['data_returnItem' => $data_returnItem]);
        return $pdf->stream();
    }

    public function pengembalianExcel()
    {
        return Excel::download(new ReturnItemExport, 'Laporan-Pengembalian.xlsx');
    }
    public function pengembalianPeriodePDF($tgl_awal, $tgl_akhir)
    {
        $data_returnItem = ReturnItem::where('return_date', '>=', $tgl_awal)
            ->where('return_date', '<=', $tgl_akhir)
            ->get();

        $pdf = PDF::loadview('pengembalian-pdf', ['data_returnItem' => $data_returnItem]);
        return $pdf->stream();
    }
    public function pengembalianPeriodeExcel($tgl_awal, $tgl_akhir)
    {
        return Excel::download(new ReturnItemPeriodeExport($tgl_awal, $tgl_akhir), 'Laporan-pengembalian-Periode.xlsx');
    }
}
