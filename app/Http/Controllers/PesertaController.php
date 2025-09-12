<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function dashboard()
    {
        return view('dashboard'); // Pakai dashboard yang sudah ada
    }
}
