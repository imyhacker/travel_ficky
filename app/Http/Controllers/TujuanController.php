<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class TujuanController extends Controller
{
    public function index_tujuan(){
        $data = Destinasi::all();
        return view('Dashboard/tujuan', compact('data'));
    }

    public function add_tujuan(Request $request){
        $cek = Destinasi::where('destinasi', $request->input('destinasi'))->exists();
        if ($cek == null) {
            Destinasi::create([
                'destinasi' => $request->input('destinasi'),
            ]);
            return redirect()->back();

        }else {
            return redirect()->back();
        }
    }
}
