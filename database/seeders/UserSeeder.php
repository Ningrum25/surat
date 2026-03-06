<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah admin sudah ada
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Ganti jika ingin password lain
                'remember_token' => Str::random(10),
                'phone' => '082121212121',
                'role' => 'admin',
            ]);
        }
    }
}
