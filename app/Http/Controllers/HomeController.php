<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function akun()
    {
        $data_user = User::where('role', 'user')->get();
        $data_admin = User::where('role', 'admin')->get();

        return view('Dashboard/akun', compact('data_user', 'data_admin'));
    }
    public function hapus_akun($id)
    {
        $data = User::find($id)->delete();
        return redirect()->back()->with('sukses', 'Berhasil Menghapus Data Pengguna');
    }
    public function tambah_akun(Request $request)
    {
        $data = User::where('email', $request->input('email'))->exists();
        if($data == TRUE){
            return redirect()->back()->with('error', 'Data Pengguna Sudah Ada');
        }else{
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role'),
            ]);
            return redirect()->back()->with('sukses', 'Berhasil Menambahkan Data Pengguna');

        }
    }
}