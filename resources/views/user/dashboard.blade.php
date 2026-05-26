@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')

    {{-- Welcome Banner --}}
    <div class="welcome-banner">
        <div>
            <h2>Selamat datang, {{ auth()->user()->name }}! 👋</h2>
            <p>Berikut ringkasan aktivitas rental kamu.</p>
        </div>
        <a href="#" class="btn-primary">
            <i class='bx bx-plus'></i> Sewa Mobil Baru
        </a>
    </div>

    {{-- Stats Cards --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class='bx bxs-car'></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Total Rental</span>
                <span class="stat-value">{{ $totalRental }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <i class='bx bxs-check-circle'></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Selesai</span>
                <span class="stat-value">{{ $rentalSelesai }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon yellow">
                <i class='bx bxs-time'></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Sedang Berlangsung</span>
                <span class="stat-value">{{ $rentalAktif }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon red">
                <i class='bx bxs-wallet'></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Total Pengeluaran</span>
                <span class="stat-value">{{ $totalPengeluaran }}</span>
            </div>
        </div>
    </div>

    <div class="dashboard-grid">

        {{-- Invoice Aktif --}}
        <div class="card">
            <div class="card-header">
                <h3><i class='bx bxs-file-doc'></i> Invoice Aktif</h3>
                <a href="#" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                @forelse($invoiceAktif as $invoice)
                    <div class="invoice-item">
                        <div class="invoice-car">
                            <img src="{{ $invoice->mobil->gambar_url }}" alt="{{ $invoice->mobil->merk }}">
                            <div>
                                <span class="invoice-merk">{{ $invoice->mobil->merk }}</span>
                                <span class="invoice-tanggal">{{ $invoice->rentang_tanggal }}</span>
                            </div>
                        </div>
                        <div class="invoice-right">
                            <span class="badge badge-{{ $invoice->status_badge['color'] }}">
                                {{ $invoice->status_badge['label'] }}
                            </span>
                            <span class="invoice-harga">{{ $invoice->formatted_total_harga }}</span>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class='bx bx-file'></i>
                        <p>Tidak ada invoice aktif.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Mobil Tersedia --}}
        <div class="card">
            <div class="card-header">
                <h3><i class='bx bxs-car'></i> Mobil Tersedia</h3>
                <a href="#" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                @forelse($mobilTersedia as $mobil)
                    <div class="mobil-item">
                        <img src="{{ $mobil->gambar_url }}" alt="{{ $mobil->merk }}">
                        <div class="mobil-info">
                            <span class="mobil-merk">{{ $mobil->merk }}</span>
                            <span class="mobil-detail">
                                {{ $mobil->tipe_mobil }} · {{ $mobil->transmisi }}
                            </span>
                        </div>
                        <div class="mobil-right">
                            <span class="mobil-harga">{{ $mobil->formatted_harga }}<small>/hari</small></span>
                            <a href="#" class="btn-sewa">Sewa</a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class='bx bx-car'></i>
                        <p>Tidak ada mobil tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Riwayat Rental --}}
        <div class="card card-full">
            <div class="card-header">
                <h3><i class='bx bx-history'></i> Riwayat Rental</h3>
                <a href="#" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Mobil</th>
                            <th>Tanggal</th>
                            <th>Durasi</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayatRental as $invoice)
                            <tr>
                                <td>{{ $invoice->mobil->merk }}</td>
                                <td>{{ $invoice->rentang_tanggal }}</td>
                                <td>{{ $invoice->durasi_label }}</td>
                                <td>{{ $invoice->formatted_total_harga }}</td>
                                <td>
                                    <span class="badge badge-{{ $invoice->status_badge['color'] }}">
                                        {{ $invoice->status_badge['label'] }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-table">Belum ada riwayat rental.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection