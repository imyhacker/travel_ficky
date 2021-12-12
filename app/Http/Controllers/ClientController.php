<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Jadwal;
use App\Models\Checkout;
use App\Models\Destinasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        $data = Destinasi::all();
        return view('Client/index', compact('jadwal', 'data'));
    }
    public function cari(Request $request)
    {
        $cari = Jadwal::where('dari', $request->input('dari'))->where('tujuan', $request->input('tujuan'))->exists();
        if($cari == TRUE){
            $data =Jadwal::where('dari', $request->input('dari'))->where('tujuan', $request->input('tujuan'))->get();
            $penumpang = $request->input('penumpang');
            $tanggal    = $request->input('tanggal');
            return view('Client/result', compact('data', 'penumpang', 'tanggal'));
        }else{
            return redirect()->back()->with('gagal', 'Belum Ada Nih Data Yang Kamu Cari...');
        }
    }
    public function pesan($slug_jadwal, $penumpang)
    {
        $jadwal = Jadwal::where('slug_jadwal', $slug_jadwal)->first();
        $total_harga = $jadwal->tarif * $penumpang;
        return view('Client/checkout', compact('jadwal', 'penumpang', 'total_harga'));
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
        return $pdf->download('Download_invoice_'.$request->input('nama').'_.pdf');
        return redirect()->back();
    }
}

