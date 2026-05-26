<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mobil;

class MobilSeeder extends Seeder
{
    public function run(): void
    {
        $mobils = [
            [
                'merk'         => 'Toyota Fortuner',
                'harga'        => 650000,
                'tipe_mobil'   => 'SUV',
                'transmisi'    => 'Automatic',
                'jumlah_kursi' => 7,
                'kilometer'    => 15000,
                'bahan_bakar'  => 'Solar',
                'status'       => 'tersedia',
                'fitur'        => ['AC', 'GPS', 'Bluetooth', 'Kamera Mundur'],
            ],
            [
                'merk'         => 'Honda Jazz',
                'harga'        => 350000,
                'tipe_mobil'   => 'Hatchback',
                'transmisi'    => 'Automatic',
                'jumlah_kursi' => 5,
                'kilometer'    => 22000,
                'bahan_bakar'  => 'Bensin',
                'status'       => 'tersedia',
                'fitur'        => ['AC', 'Bluetooth', 'USB Charger'],
            ],
            [
                'merk'         => 'Mitsubishi Xpander',
                'harga'        => 450000,
                'tipe_mobil'   => 'MPV',
                'transmisi'    => 'Automatic',
                'jumlah_kursi' => 7,
                'kilometer'    => 18000,
                'bahan_bakar'  => 'Bensin',
                'status'       => 'disewa',
                'fitur'        => ['AC', 'GPS', 'Bluetooth'],
            ],
            [
                'merk'         => 'Toyota Avanza',
                'harga'        => 300000,
                'tipe_mobil'   => 'MPV',
                'transmisi'    => 'Manual',
                'jumlah_kursi' => 7,
                'kilometer'    => 35000,
                'bahan_bakar'  => 'Bensin',
                'status'       => 'tersedia',
                'fitur'        => ['AC'],
            ],
            [
                'merk'         => 'Honda CR-V',
                'harga'        => 550000,
                'tipe_mobil'   => 'SUV',
                'transmisi'    => 'Automatic',
                'jumlah_kursi' => 5,
                'kilometer'    => 10000,
                'bahan_bakar'  => 'Bensin',
                'status'       => 'tersedia',
                'fitur'        => ['AC', 'GPS', 'Sunroof', 'Kamera Mundur', 'Bluetooth'],
            ],
            [
                'merk'         => 'Daihatsu Sigra',
                'harga'        => 250000,
                'tipe_mobil'   => 'MPV',
                'transmisi'    => 'Manual',
                'jumlah_kursi' => 7,
                'kilometer'    => 40000,
                'bahan_bakar'  => 'Bensin',
                'status'       => 'tidak_tersedia',
                'fitur'        => ['AC'],
            ],
        ];

        foreach ($mobils as $mobil) {
            Mobil::create([
                ...$mobil,
                'fitur' => json_encode($mobil['fitur']),
            ]);
        }
    }
}