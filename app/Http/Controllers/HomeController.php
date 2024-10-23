<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

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
}
