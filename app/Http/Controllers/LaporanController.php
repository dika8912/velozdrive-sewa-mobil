<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function export(Request $request)
    {
        // Stub export: in real app generate CSV/XLSX
        return back()->with('success', 'Ekspor laporan dimulai (placeholder).');
    }
}
