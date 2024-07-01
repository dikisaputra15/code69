<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{

    public function index(Request $request)
    {
        $mejas = DB::table('mejas')->orderBy('id', 'desc')->get();
        return view('pages.keranjangs.index', compact('mejas'));
    }

    public function store(Request $request)
    {
        $sub_total = $request->harga_bayar * $request->jml;
        Keranjang::create([
            'id_produk' => $request->id_produk,
            'id_meja' => $request->id_meja,
            'jml' => $request->jml,
            'harga_bayar' => $request->harga_bayar,
            'sub_total' => $sub_total
        ]);

        return redirect("/")->with('success', 'Data successfully created');

    }

    public function destroykeranjang($id)
    {
        $meja = Keranjang::find($id);
        $id_meja = $meja->id_meja;
        $mastermeja = Meja::find($id_meja);

        DB::table('keranjangs')->where('id',$id)->delete();
        return redirect("meja/$mastermeja->id/lihatpesanan")->with('success', 'Data successfully Deleted');
    }

}
