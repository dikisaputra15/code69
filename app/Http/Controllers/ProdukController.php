<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = DB::table('produks')->orderBy('id', 'desc')->get();
        return view('pages.produks.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.produks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $nama_produk = str_replace(" ", "-", $request->nama_produk);
        $num = hexdec(uniqid());
        $filename = $nama_produk.'_'.$num.'.'.$extension;

        Storage::putFileAs('public/piccourse', $file, $filename);

        Produk::create([
            'no_produk' => $num,
            'nama_produk' => $request->nama_produk,
            'status_produk' => $request->status_produk,
            'harga' => $request->harga,
            'deskripsi_produk' => $request->deskripsi_produk,
            'path_gambar' => $filename
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = \App\Models\Produk::findOrFail($id);
        return view('pages.produks.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cekfile = $request->gambar;
        $old_file = $request->old_file;
        $file = $request->file('gambar');

        if($cekfile != ""){
            $filedel = Storage::url('piccourse/'. $old_file);

            if(File::exists($filedel)) {
                File::delete($filedel);
            }

            $extension = $file->getClientOriginalExtension();

            $nama_file = str_replace(" ", "-", $request->gambar);
            $num = hexdec(uniqid());

            $filename = $nama_file.'_'.$num.'.'.$extension;

            Storage::putFileAs('public/piccourse', $file, $filename);


            DB::table('produks')->where('id',$id)->update([
                'no_produk' => $request->no_produk,
                'nama_produk' => $request->nama_produk,
                'status_produk' => $request->status_produk,
                'harga' => $request->harga,
                'deskripsi_produk' => $request->deskripsi_produk,
                'path_gambar' => $filename
            ]);
        }else{
            DB::table('produks')->where('id',$id)->update([
                'no_produk' => $request->no_produk,
                'nama_produk' => $request->nama_produk,
                'status_produk' => $request->status_produk,
                'harga' => $request->harga,
                'deskripsi_produk' => $request->deskripsi_produk
            ]);
        }

        return redirect()->route('produk.index')->with('success', 'Produk successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk successfully deleted');
    }
}
