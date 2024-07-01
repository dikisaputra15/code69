<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MejaController extends Controller
{
    public function index(Request $request)
    {
        $mejas = DB::table('mejas')->orderBy('id', 'desc')->get();
        return view('pages.mejas.index', compact('mejas'));
    }

    public function create()
    {
        return view('pages.mejas.create');
    }

    public function store(Request $request)
    {
        Meja::create([
            'no_meja' => $request->no_meja
        ]);

        return redirect()->route('meja.index')->with('success', 'No Meja successfully created');
    }

    public function destroy(Meja $meja)
    {
        $meja->delete();
        return redirect()->route('meja.index')->with('success', 'No Meja successfully deleted');
    }

    public function edit($id)
    {
        $meja = \App\Models\Meja::findOrFail($id);
        return view('pages.mejas.edit', compact('meja'));
    }

    public function update(Request $request, $id)
    {
        DB::table('mejas')->where('id',$id)->update([
            'no_meja' => $request->no_meja
        ]);

        return redirect()->route('meja.index')->with('success', 'No Meja successfully updated');
    }

    public function lihatpesanan($id)
    {
        $keranjangs = DB::table('keranjangs')
                ->join('produks', 'produks.id', '=', 'keranjangs.id_produk')
                ->join('mejas', 'mejas.id', '=', 'keranjangs.id_meja')
                ->select('keranjangs.*', 'produks.nama_produk', 'mejas.no_meja')->where('keranjangs.id_meja', $id)->orderBy('keranjangs.id', 'desc')->get();
        $total = DB::table('keranjangs')
                ->where('keranjangs.id_meja', $id)
                ->sum('sub_total');
        $meja = Meja::find($id);
        return view('pages.mejas.lihatpesanan', compact('keranjangs','total','meja'));
    }
}
