<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Destinasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index_jadwal()
    {
        $data = Destinasi::all();
        $jadwal = Jadwal::all();
        return view('Dashboard/index_jadwal', compact('data', 'jadwal'));
    }
    public function up_jadwal(Request $request)
    {
        $data = Jadwal::create([
            'dari' => $request->input('dari'),
            'tujuan' => $request->input('tujuan'),
            'tarif' => $request->input('tarif'),
            'jam' => $request->input('jam'),
            'menit' => $request->input('menit'),
            'area' => $request->input('area'),
            'slug_jadwal' => Str::slug(Str::random(8), ''),
        ]);
        return redirect()->back()->with('sukses', 'Jadwal Baru Berhasil Di Tambahkan');
    }
    public function hapus_jadwal($id)
    {
        Jadwal::find($id)->delete();
        return redirect()->back()->with('sukses', 'Jadwal Berhasil Di Hapus');

    }
}
