<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

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
        $dibayar = Checkout::where('status_dibayar', 1)->count();
        $dbelum = Checkout::where('status_dibayar', 0)->count();
        $semua = Checkout::count();
        return view('Dashboard/index', compact('dibayar', 'dbelum', 'semua'));
    }
}
