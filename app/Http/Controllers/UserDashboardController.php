<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Mobil;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalRental = Invoice::where('user_id', $userId)->count();
        $rentalSelesai = Invoice::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();
        $rentalAktif = Invoice::where('user_id', $userId)
            ->whereIn('status', ['pending', 'confirmed', 'ongoing'])
            ->count();
        $totalPengeluaran = Invoice::where('user_id', $userId)
            ->sum('total_harga');

        $totalPengeluaran = 'Rp ' . number_format($totalPengeluaran, 0, ',', '.');

        $invoiceAktif = Invoice::with('mobil')
            ->where('user_id', $userId)
            ->whereIn('status', ['pending', 'confirmed', 'ongoing'])
            ->latest()
            ->take(5)
            ->get();

        $mobilTersedia = Mobil::where('status', 'tersedia')
            ->latest()
            ->take(5)
            ->get();

        $riwayatRental = Invoice::with('mobil')
            ->where('user_id', $userId)
            ->whereIn('status', ['completed', 'cancelled'])
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard', compact(
            'totalRental',
            'rentalSelesai',
            'rentalAktif',
            'totalPengeluaran',
            'invoiceAktif',
            'mobilTersedia',
            'riwayatRental'
        ));
    }
}
