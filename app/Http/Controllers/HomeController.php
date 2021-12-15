<?php

namespace App\Http\Controllers;
use Auth;
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
        $udibayar = Checkout::where('email', Auth::user()->email)->where('status_dibayar', 1)->count();
        $ubelom = Checkout::where('nama', Auth::user()->name)->where('status_dibayar', 0)->count();
        $usemua = Checkout::where('nama', Auth::user()->name)->count();

        return view('Dashboard/index', compact('dibayar', 'dbelum', 'semua', 'udibayar', 'usemua', 'ubelom'));
    }
}
