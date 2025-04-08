<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            'kategori_kode' => 'SNK',
            'kategori_nama' => 'Suku Cadang',
            'created_at' => now(),
        ];
        DB::table('m_kategori')->insert($data);
        $tes = DB::table('m_kategori')->get();
        return view('kategori.index', ['data' => $tes]);
        // $data = DB::select('select * from m_kategori');
        // return view('kategori.index', ['data' => $data]);
    }
}
