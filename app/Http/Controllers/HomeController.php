<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.fronts.index');
    }

    public function dashboard(Request $request)
    {
        return view('pages.dashboard');
    }
}
