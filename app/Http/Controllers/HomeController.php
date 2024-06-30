<?php

namespace App\Http\Controllers;

use App\Models\Warung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $warungs = DB::table('warungs')->orderBy('id', 'desc')->get();
        return view('pages.fronts.index', compact('warungs'));
    }

    public function lihatproduk($id)
    {
        $warung = \App\Models\Warung::findOrFail($id);
        $mejas = DB::table('mejas')->orderBy('id', 'asc')->get();
        $produks = DB::table('produks')->where('id_warung', $id)->orderBy('produks.id', 'desc')->get();
        return view('pages.fronts.lihatproduk', compact('warung','produks', 'mejas'));
    }
}
