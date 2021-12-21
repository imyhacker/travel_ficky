<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Jadwal;
use App\Models\Checkout;
use App\Models\Destinasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\App;
use PDO;

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
            return redirect()->back()->with('error', 'Belum Ada Nih Data Yang Kamu Cari...');
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
            'rekening' => $request->input('rekening'),
            'alamat_jemput' => $request->input('alamat_jemput'),
            'status_pembatalan' => 0,
            'total_dibayar' => $cek->tarif * $penumpang,
            'status_dibayar' => 0,
            'kode_pembayaran' => Str::slug(Str::random(6), ''),
        ]);
        $pdf = PDF::loadview('Dashboard/Mypdf', compact('cek2', 'cek'));
        return $pdf->download('Download_invoice_'.$request->input('nama').'_.pdf');
    }
    public function pemesan()
    {
        $data = Checkout::orderBy('id', 'DESC')->get();
        return view('Dashboard/pemesan', compact('data'));
    }
    public function success($kode_pembayaran)
    {
        $cek = Checkout::where('kode_pembayaran', $kode_pembayaran)->first();
        if(is_null($cek->status_dibayar) || $cek->status_dibayar == 0){
 
            $data = Checkout::where('kode_pembayaran', $kode_pembayaran)->first()->update([
                'status_dibayar' => 1,
            ]);
    
            return redirect()->back()->with('sukses', 'Kode Pembayaran : '.$kode_pembayaran.' Berhasil Melakukan Pembayaran');
        }else{
            return redirect()->back()->with('error', 'Kode Pembayaran : '.$kode_pembayaran.' Sudah Pernah Melakukan Pembayaran');
        }
       
    }
    public function cek_pesananmu()
    {
        $data = Checkout::where('nama', Auth::user()->name)->get();
        return view('Dashboard/Users/index', compact('data'));
    }
    public function hapus_pembayaran($kode_pembayaran)
    {
        $data = Checkout::where('kode_pembayaran', $kode_pembayaran)->first()->delete();
        return redirect()->back()->with('sukses', 'Kode Pembayaran : '.$kode_pembayaran.' Berhasil Di Hapus!');
    }
    public function reset_pembayaran($kode_pembayaran)
    {
        $cek = Checkout::where('kode_pembayaran', $kode_pembayaran)->first();
        if($cek->status_dibayar == 1){
 
            $data = Checkout::where('kode_pembayaran', $kode_pembayaran)->first()->update([
                'status_dibayar' => 0,
            ]);
    
            return redirect()->back()->with('sukses', 'Kode Pembayaran : '.$kode_pembayaran.' Berhasil Di Reset');
        }else{
            return redirect()->back()->with('error', 'Kode Pembayaran : '.$kode_pembayaran.' Sudah Pernah Melakukan Reset');
        }    
    }
    public function batalkan($kode_pembayaran)
    {
        $cek = Checkout::where('kode_pembayaran', $kode_pembayaran)->first();
        if($cek->status_pembatalan == 0){
 
            $data = Checkout::where('kode_pembayaran', $kode_pembayaran)->first()->update([
                'status_pembatalan' => 1,
            ]);
    
            return redirect()->back()->with('sukses', 'Kode Pembayaran : '.$kode_pembayaran.' Berhasil Di Batalkan');
        }else{
            return redirect()->back()->with('error', 'Kode Pembayaran : '.$kode_pembayaran.' Sudah Dibatalkan');
        }    
    }
    public function selengkapnya($kode_pembayaran)
    {
        $selengkapnya = Checkout::where('kode_pembayaran', $kode_pembayaran)->first();
        return view('Dashboard/selengkapnya', compact('selengkapnya'));
    }
}
