<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserProfile;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::create([
            'name'     => 'Admin DriveNow',
            'email'    => 'admin@drivenow.id',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        UserProfile::create([
            'user_id'      => $admin->id,
            'phone_number' => '081234567890',
            'address'      => 'Jl. Pandanaran No. 45, Semarang',
            'profile_picture' => 'profile_pictures/user.png',
        ]);

        // Users biasa
        $users = [
            ['name' => 'Budi Santoso',   'email' => 'budi@email.com',   'phone' => '081111111111', 'address' => 'Jl. Diponegoro No. 12, Semarang'],
            ['name' => 'Siti Rahayu',    'email' => 'siti@email.com',   'phone' => '082222222222', 'address' => 'Jl. Pemuda No. 8, Semarang'],
            ['name' => 'Agus Wijaya',    'email' => 'agus@email.com',   'phone' => '083333333333', 'address' => 'Jl. Gajah Mada No. 3, Semarang'],
            ['name' => 'Dewi Kusuma',    'email' => 'dewi@email.com',   'phone' => '084444444444', 'address' => 'Jl. Imam Bonjol No. 21, Semarang'],
            ['name' => 'Rizki Pratama',  'email' => 'rizki@email.com',  'phone' => '085555555555', 'address' => 'Jl. MT Haryono No. 5, Semarang'],
        ];

        foreach ($users as $u) {
            $user = User::create([
                'name'     => $u['name'],
                'email'    => $u['email'],
                'password' => Hash::make('password'),
                'role'     => 'user',
            ]);

            UserProfile::create([
                'user_id'      => $user->id,
                'phone_number' => $u['phone'],
                'address'      => $u['address'],
                'profile_picture' => 'profile_pictures/user.png',
            ]);
        }
    }
}