<?php

namespace App\Http\Controllers;

use App\Models\Warung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WarungController extends Controller
{
    public function index(Request $request)
    {
        $warungs = DB::table('warungs')->orderBy('id', 'desc')->get();
        return view('pages.warungs.index', compact('warungs'));
    }

    public function create()
    {
        return view('pages.warungs.create');
    }

    public function store(Request $request)
    {
        Warung::create([
            'nama_warung' => $request->nama_warung
        ]);

        return redirect()->route('warung.index')->with('success', 'Kategori successfully created');
    }

    public function destroy(Warung $warung)
    {
        $warung->delete();
        return redirect()->route('warung.index')->with('success', 'Warung successfully deleted');
    }

    public function edit($id)
    {
        $warung = \App\Models\Warung::findOrFail($id);
        return view('pages.warungs.edit', compact('warung'));
    }

    public function update(Request $request, $id)
    {
        DB::table('warungs')->where('id',$id)->update([
            'nama_warung' => $request->nama_warung
        ]);

        return redirect()->route('warung.index')->with('success', 'Warung successfully updated');
    }
}
