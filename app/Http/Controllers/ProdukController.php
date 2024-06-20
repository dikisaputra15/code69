<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produks = DB::table('produks')
            ->join('kategoris', 'kategoris.id', '=', 'produks.id_kategori')
            ->join('warungs', 'warungs.id', '=', 'produks.id_warung')
            ->select('produks.*', 'kategoris.nama_kategori', 'warungs.nama_warung')
            ->orderBy('produks.id', 'desc')
            ->get();
        return view('pages.produks.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = DB::table('kategoris')->get();
        $warungs = DB::table('warungs')->get();
        return view('pages.produks.create', compact('kategoris','warungs'));
    }

    public function store(Request $request)
    {
        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $nama_produk = str_replace(" ", "-", $request->nama_produk);
        $num = hexdec(uniqid());
        $filename = $nama_produk.'_'.$num.'.'.$extension;

        Storage::putFileAs('public/gambarproduk', $file, $filename);

        Produk::create([
            'id_warung' => $request->id_warung,
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'deskripsi_produk' => $request->deskripsi_produk,
            'path_gambar' => $filename
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk successfully created');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk successfully deleted');
    }

    public function edit($id)
    {
        $produk = \App\Models\Produk::findOrFail($id);
        $warungs = DB::table('warungs')->get();
        $kategoris = DB::table('kategoris')->get();
        return view('pages.produks.edit', compact('produk','kategoris','warungs'));
    }

    public function update(Request $request, $id)
    {
        $cekfile = $request->gambar;
        $old_file = $request->old_file;
        $file = $request->file('gambar');

        if($cekfile != ""){
            $filedel = Storage::url('gambarproduk/'. $old_file);

            if(File::exists($filedel)) {
                File::delete($filedel);
            }

            $extension = $file->getClientOriginalExtension();

            $nama_file = str_replace(" ", "-", $request->gambar);
            $num = hexdec(uniqid());

            $filename = $nama_file.'_'.$num.'.'.$extension;

            Storage::putFileAs('public/gambarproduk', $file, $filename);


            DB::table('produks')->where('id',$id)->update([
                'id_warung' => $request->id_warung,
                'id_kategori' => $request->id_kategori,
                'nama_produk' => $request->nama_produk,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'deskripsi_produk' => $request->deskripsi_produk,
                'path_gambar' => $filename
            ]);
        }else{
            DB::table('produks')->where('id',$id)->update([
                'id_warung' => $request->id_warung,
                'id_kategori' => $request->id_kategori,
                'nama_produk' => $request->nama_produk,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'deskripsi_produk' => $request->deskripsi_produk
            ]);
        }

        return redirect()->route('produk.index')->with('success', 'Produk successfully updated');

    }
}
