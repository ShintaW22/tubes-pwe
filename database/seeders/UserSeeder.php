<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Password yang sudah di-hash
            'role' => 'admin',  // Mengatur role sebagai admin
            'is_admin' => true, // Menandakan bahwa user ini adalah admin
        ]);

        // Membuat akun user biasa
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),  // Password yang sudah di-hash
            'role' => 'user',   // Mengatur role sebagai user
            'is_admin' => false,  // Menandakan bahwa user ini bukan admin
        ]);
    }
}
