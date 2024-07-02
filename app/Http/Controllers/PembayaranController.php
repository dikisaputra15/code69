<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $pesanans = DB::table('pesanans')
                ->join('mejas', 'mejas.id', '=', 'pesanans.id_meja')
                ->select('pesanans.*', 'mejas.no_meja')
                ->orderBy('id', 'desc')->get();
        return view('pages.pembayarans.index', compact('pesanans'));
    }
}
