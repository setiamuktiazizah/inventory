<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $id = Auth::user()->id_role;
        // if ($id == 1) {
        //     return redirect('/dashboard-admin');
        // } elseif ($id == 2) {
        //     return redirect('/dashboard-operator');
        // } else {
        //     return redirect('/dashboard-peminjam');
        // }
        return redirect('/dashboard');
    }
}
