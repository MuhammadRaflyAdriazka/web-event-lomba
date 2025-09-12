<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepalaDinasController extends Controller
{
    public function dashboard()
    {
        return view('kepala.dashboard');
    }
}
