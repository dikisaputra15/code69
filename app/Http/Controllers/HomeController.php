<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = Produk::orderBy('id', 'desc')->get();
        return view('pages.fronts.index', compact('items'));
    }

    public function dashboard(Request $request)
    {
        return view('pages.dashboard');
    }

    public function formdaftar($id)
    {
        $item = \App\Models\Produk::findOrFail($id);
        return view('pages.fronts.formdaftar', compact('item'));
    }

    public function storedaftar(Request $request)
    {
        Peserta::create([
            'id_produk' =>$request->id_produk,
            'nama_peserta' => $request->nama_peserta,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'status' => 'Unpaid'
        ]);

        return view('pages.fronts.formbayar');
    }

    public function webinar(Request $request)
    {
        // $webinars = DB::table('pesertas')
    	// ->join('produks', 'produks.id', '=', 'pesertas.id_produk')
    	// ->select('pesertas.*', 'produks.nama_produk')
    	// ->orderBy('keranjangs.id', 'desc')->get();

        $webinars = Produk::orderBy('id', 'desc')->get();

        return view('pages.produks.datawebinar', compact('webinars'));
    }

    public function lihatpeserta($id)
    {
        $pesertas = DB::table('pesertas')
        ->where('id_produk', $id)
    	->orderBy('id', 'desc')->get();

        return view('pages.produks.peserta', compact('pesertas'));
    }

    public function updatepembayaran($id)
    {
        $item = \App\Models\Peserta::findOrFail($id);

        return view('pages.produks.updatepembayaran', compact('item'));
    }

    public function storeupdatepembayaran(Request $request)
    {
        $id = $request->id_peserta;

        DB::table('pesertas')->where('id',$id)->update([
            'status' => $request->status
        ]);

        return redirect("/webinar");
    }
}
