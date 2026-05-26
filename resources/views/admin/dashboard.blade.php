@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')

@section('content')

    {{-- Welcome Banner --}}
    <div class="welcome-banner">
        <div>
            <h2>Selamat datang, {{ auth()->user()->name }}! 👋</h2>
            <p>Berikut ringkasan operasional Velodrive hari ini.</p>
        </div>
        <a href="#" class="btn-primary">
            <i class='bx bx-plus'></i> Tambah Mobil
        </a>
    </div>

    {{-- Stats Cards --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class='bx bxs-car'></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Total Mobil</span>
                <span class="stat-value">{{ $totalMobil }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <i class='bx bxs-user-check'></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Total User</span>
                <span class="stat-value">{{ $totalUser }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon yellow">
                <i class='bx bxs-time'></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Rental Aktif</span>
                <span class="stat-value">{{ $rentalAktif }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <i class='bx bxs-wallet'></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Pendapatan Bulan Ini</span>
                <span class="stat-value">{{ $pendapatanBulanIni }}</span>
            </div>
        </div>
    </div>

    <div class="dashboard-grid">

        {{-- Invoice Pending --}}
        <div class="card">
            <div class="card-header">
                <h3><i class='bx bxs-file-doc'></i> Invoice Pending</h3>
                <a href="#" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                @forelse($invoicePending as $invoice)
                    <div class="invoice-item">
                        <div class="invoice-car">
                            <div>
                                <span class="invoice-merk">{{ $invoice->user->name }}</span>
                                <span class="invoice-tanggal">{{ $invoice->mobil->merk }} · {{ $invoice->rentang_tanggal }}</span>
                            </div>
                        </div>
                        <div class="invoice-right">
                            <span class="badge badge-yellow">Pending</span>
                            <span class="invoice-harga">{{ $invoice->formatted_total_harga }}</span>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class='bx bx-check-circle'></i>
                        <p>Tidak ada invoice pending.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Mobil Status --}}
        <div class="card">
            <div class="card-header">
                <h3><i class='bx bxs-car'></i> Status Armada</h3>
                <a href="#" class="card-link">Kelola Mobil</a>
            </div>
            <div class="card-body">
                @forelse($statusMobil as $mobil)
                    <div class="mobil-item">
                        <img src="{{ $mobil->gambar_url }}" alt="{{ $mobil->merk }}">
                        <div class="mobil-info">
                            <span class="mobil-merk">{{ $mobil->merk }}</span>
                            <span class="mobil-detail">{{ $mobil->tipe_mobil }} · {{ $mobil->transmisi }}</span>
                        </div>
                        <span class="badge badge-{{ $mobil->status_badge['color'] }}">
                            {{ $mobil->status_badge['label'] }}
                        </span>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class='bx bx-car'></i>
                        <p>Belum ada data mobil.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Transaksi Terbaru --}}
        <div class="card card-full">
            <div class="card-header">
                <h3><i class='bx bx-transfer'></i> Transaksi Terbaru</h3>
                <a href="#" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Mobil</th>
                            <th>Metode</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksiTerbaru as $trx)
                            <tr>
                                <td>{{ $trx->user->name }}</td>
                                <td>{{ $trx->invoice->mobil->merk }}</td>
                                <td>{{ $trx->payment_method }}</td>
                                <td>{{ $trx->formatted_amount }}</td>
                                <td>
                                    <span class="badge badge-{{ $trx->status_badge['color'] }}">
                                        {{ $trx->status_badge['label'] }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-table">Belum ada transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection