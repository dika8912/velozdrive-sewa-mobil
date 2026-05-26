<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Mobil;
use App\Models\Transaction;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalMobil = Mobil::count();
        $totalUser = User::where('role', 'user')->count();
        $rentalAktif = Invoice::whereIn('status', ['pending', 'confirmed', 'ongoing'])->count();
        $pendapatanBulanIni = Transaction::where('status', 'paid')
            ->whereMonth('paid_at', now()->month)
            ->whereYear('paid_at', now()->year)
            ->sum('amount');

        $pendapatanBulanIni = 'Rp ' . number_format($pendapatanBulanIni, 0, ',', '.');

        $invoicePending = Invoice::with(['user', 'mobil'])
            ->where('status', 'pending')
            ->latest('tanggal_mulai')
            ->take(5)
            ->get();

        $statusMobil = Mobil::orderBy('status')->get();

        $transaksiTerbaru = Transaction::with(['user', 'invoice.mobil'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalMobil',
            'totalUser',
            'rentalAktif',
            'pendapatanBulanIni',
            'invoicePending',
            'statusMobil',
            'transaksiTerbaru'
        ));
    }
}
