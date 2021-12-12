<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class TujuanController extends Controller
{
    public function index_tujuan(){
        return view('Dashboard/tujuan');
    }

    public function add_tujuan(Request $request){
        $cek = Destinasi::where('destinasi', $request->input('destinasi'))->exists();
        if ($cek == null) {
            Destinasi::create([
                'destinasi' => $request->input('destinasi'),
            ]);
        }else {
            return redirect()->back();
        }
    }
}