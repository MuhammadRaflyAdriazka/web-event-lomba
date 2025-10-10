<?php

namespace App\Http\Controllers;

use App\Models\Event;


class AdminDinasController extends Controller
{
    // Dashboard Admin - Menampilkan semua event
    public function dashboard()
    {
        $events = Event::latest()->get();
        return view('admin.dashboard', compact('events'));
    }
}