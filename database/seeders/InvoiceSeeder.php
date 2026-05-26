<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $invoices = [
            [
                'user_id'          => 2, // Budi
                'mobil_id'         => 1, // Fortuner
                'tanggal_mulai'    => '2026-05-12',
                'tanggal_selesai'  => '2026-05-15',
                'durasi_hari'      => 3,
                'total_harga'      => 1950000,
                'status'           => 'completed',
                'alamat_pengambilan' => 'Kantor DriveNow, Semarang',
            ],
            [
                'user_id'          => 3, // Siti
                'mobil_id'         => 3, // Xpander
                'tanggal_mulai'    => '2026-05-10',
                'tanggal_selesai'  => '2026-05-13',
                'durasi_hari'      => 3,
                'total_harga'      => 1350000,
                'status'           => 'ongoing',
                'alamat_pengambilan' => 'Kantor DriveNow, Semarang',
            ],
            [
                'user_id'          => 4, // Agus
                'mobil_id'         => 2, // Jazz
                'tanggal_mulai'    => '2026-05-20',
                'tanggal_selesai'  => '2026-05-22',
                'durasi_hari'      => 2,
                'total_harga'      => 700000,
                'status'           => 'pending',
                'alamat_pengambilan' => 'Bandara Ahmad Yani, Semarang',
            ],
            [
                'user_id'          => 5, // Dewi
                'mobil_id'         => 5, // CR-V
                'tanggal_mulai'    => '2026-05-18',
                'tanggal_selesai'  => '2026-05-21',
                'durasi_hari'      => 3,
                'total_harga'      => 1650000,
                'status'           => 'confirmed',
                'alamat_pengambilan' => 'Kantor DriveNow, Semarang',
            ],
            [
                'user_id'          => 6, // Rizki
                'mobil_id'         => 4, // Avanza
                'tanggal_mulai'    => '2026-04-01',
                'tanggal_selesai'  => '2026-04-03',
                'durasi_hari'      => 2,
                'total_harga'      => 600000,
                'status'           => 'cancelled',
                'alamat_pengambilan' => 'Kantor DriveNow, Semarang',
            ],
        ];

        foreach ($invoices as $invoice) {
            Invoice::create($invoice);
        }
    }
}