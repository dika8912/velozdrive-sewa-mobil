<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    // User methods
    public function index()
    {
        $transaksis = Transaction::with(['invoice.mobil'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('user.transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaction::with(['invoice.mobil'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.transaksi.show', compact('transaksi'));
    }

    public function pay(Request $request)
    {
        $request->validate([
            'invoice_id'     => ['required', 'exists:invoices,id'],
            'payment_method' => ['required', 'string'],
            'payment_proof'  => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $invoice = Invoice::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->findOrFail($request->invoice_id);

        if ($invoice->transaction) {
            return back()->with('error', 'Invoice ini sudah memiliki transaksi.');
        }

        $path = $request->file('payment_proof')->store('payment_proofs', 'public');

        Transaction::create([
            'user_id'        => Auth::id(),
            'invoice_id'     => $invoice->id,
            'payment_method' => $request->payment_method,
            'amount'         => $invoice->total_harga,
            'status'         => 'pending',
            'payment_proof'  => $path,
        ]);

        return redirect()->route('user.transaksi.index')
            ->with('success', 'Bukti pembayaran berhasil dikirim. Menunggu verifikasi admin.');
    }

    // Admin methods
    public function verify($id)
    {
        $trx = Transaction::findOrFail($id);
        $trx->update(['status' => 'paid']);

        if ($trx->invoice) {
            $trx->invoice->update(['status' => 'confirmed']);
        }

        return back()->with('success', 'Transaksi diverifikasi.');
    }

    public function reject($id)
    {
        $trx = Transaction::findOrFail($id);
        $trx->update(['status' => 'failed']);

        return back()->with('success', 'Transaksi ditolak.');
    }
}
