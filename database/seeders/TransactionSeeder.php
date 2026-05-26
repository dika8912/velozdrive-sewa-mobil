<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $transactions = [
            [
                'user_id'        => 2,
                'invoice_id'     => 1,
                'payment_method' => 'Transfer Bank',
                'amount'         => 1950000,
                'status'         => 'paid',
                'paid_at'        => '2026-05-11 10:30:00',
            ],
            [
                'user_id'        => 3,
                'invoice_id'     => 2,
                'payment_method' => 'QRIS',
                'amount'         => 1350000,
                'status'         => 'paid',
                'paid_at'        => '2026-05-09 14:15:00',
            ],
            [
                'user_id'        => 4,
                'invoice_id'     => 3,
                'payment_method' => 'Transfer Bank',
                'amount'         => 700000,
                'status'         => 'pending',
                'paid_at'        => null,
            ],
            [
                'user_id'        => 5,
                'invoice_id'     => 4,
                'payment_method' => 'OVO',
                'amount'         => 1650000,
                'status'         => 'paid',
                'paid_at'        => '2026-05-17 09:00:00',
            ],
            [
                'user_id'        => 6,
                'invoice_id'     => 5,
                'payment_method' => 'GoPay',
                'amount'         => 600000,
                'status'         => 'refunded',
                'paid_at'        => null,
            ],
        ];

        foreach ($transactions as $trx) {
            Transaction::create($trx);
        }
    }
}