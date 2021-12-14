<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Checkout;
use App\Models\Destinasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\App;

class TiketController extends Controller
{
    public function index_tiket()
    {
        $data = Destinasi::all();
        return view('Dashboard/index_tiket', compact('data'));
    }
    public function cari(Request $request)
    {
        $cari = Jadwal::where('dari', $request->input('dari'))->where('tujuan', $request->input('tujuan'))->exists();
        if($cari == TRUE){
            $data =Jadwal::where('dari', $request->input('dari'))->where('tujuan', $request->input('tujuan'))->get();
            $penumpang = $request->input('penumpang');
            $tanggal    = $request->input('tanggal');
            return view('Dashboard/result', compact('data', 'penumpang', 'tanggal'));
        }else{
            return redirect()->back()->with('gagal', 'Belum Ada Nih Data Yang Kamu Cari...');
        }
    }
    public function pesan($slug_jadwal, $penumpang)
    {
        $jadwal = Jadwal::where('slug_jadwal', $slug_jadwal)->first();
        $total_harga = $jadwal->tarif * $penumpang;
        return view('Dashboard/checkout', compact('jadwal', 'penumpang', 'total_harga'));
    }
    public function checkout(Request $request, $slug_jadwal, $penumpang)
    {
        $cek = Jadwal::where('slug_jadwal', $slug_jadwal)->first();
        $cek2 = Checkout::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'dari' => $request->input('dari'),
            'tujuan' =>$request->input('tujuan'),
            'penumpang' => $penumpang,
            'payment' => $request->input('paymentMethod'),
            'total_dibayar' => $cek->tarif * $penumpang,
            'status_dibayar' => 0,
            'kode_pembayaran' => Str::slug(Str::random(6), ''),
        ]);
        $pdf = PDF::loadview('Dashboard/Mypdf', compact('cek2', 'cek'));
        return $pdf->stream('itsolutionstuff.pdf');
    }
    public function pemesan()
    {
        $data = Checkout::orderBy('id', 'DESC')->get();
        return view('Dashboard/pemesan', compact('data'));
    }
    public function success($kode_pembayaran)
    {
        $data = Checkout::where('kode_pembayaran', $kode_pembayaran)->first()->update([
            'status_dibayar' => 1,
        ]);
        return redirect()->back();
    }
    public function cek_pesananmu()
    {
        return view('Dashboard/Users/index');
    }
}
