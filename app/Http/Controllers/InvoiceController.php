<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Mobil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    // User methods
    public function index()
    {
        $invoices = Invoice::with('mobil')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('user.invoice.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::with(['mobil', 'transaction'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.invoice.show', compact('invoice'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobil_id'           => ['required', 'exists:mobil,id'],
            'tanggal_mulai'      => ['required', 'date', 'after_or_equal:today'],
            'tanggal_selesai'    => ['required', 'date', 'after:tanggal_mulai'],
            'alamat_pengambilan' => ['required', 'string', 'max:255'],
        ]);

        $mobil = Mobil::findOrFail($request->mobil_id);

        if (!$mobil->is_tersedia) {
            return back()->with('error', 'Mobil tidak tersedia untuk disewa.');
        }

        $tanggalMulai   = Carbon::parse($request->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($request->tanggal_selesai);
        $durasiHari     = $tanggalMulai->diffInDays($tanggalSelesai);
        $totalHarga     = $durasiHari * $mobil->harga;

        $invoice = Invoice::create([
            'user_id'            => Auth::id(),
            'mobil_id'           => $mobil->id,
            'tanggal_mulai'      => $tanggalMulai,
            'tanggal_selesai'    => $tanggalSelesai,
            'durasi_hari'        => $durasiHari,
            'total_harga'        => $totalHarga,
            'status'             => 'pending',
            'alamat_pengambilan' => $request->alamat_pengambilan,
        ]);

        $mobil->update(['status' => 'disewa']);

        return redirect()->route('user.invoice.show', $invoice->id)
            ->with('success', 'Invoice berhasil dibuat. Silakan lakukan pembayaran.');
    }

    public function cancel($id)
    {
        $invoice = Invoice::where('user_id', Auth::id())->findOrFail($id);

        if (!in_array($invoice->status, ['pending', 'confirmed'])) {
            return back()->with('error', 'Invoice tidak dapat dibatalkan.');
        }

        $invoice->update(['status' => 'cancelled']);
        $invoice->mobil->update(['status' => 'tersedia']);

        return back()->with('success', 'Invoice berhasil dibatalkan.');
    }

    // Admin methods
    public function adminIndex()
    {
        $invoices = Invoice::with(['user', 'mobil'])->latest()->paginate(20);

        return view('admin.invoice.index', compact('invoices'));
    }

    public function adminShow($id)
    {
        $invoice = Invoice::with(['user', 'mobil', 'transaction'])->findOrFail($id);

        return view('admin.invoice.show', compact('invoice'));
    }

    public function confirm($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update(['status' => 'confirmed']);

        return back()->with('success', 'Invoice dikonfirmasi.');
    }

    public function complete($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update(['status' => 'completed']);

        return back()->with('success', 'Invoice selesai.');
    }
}
