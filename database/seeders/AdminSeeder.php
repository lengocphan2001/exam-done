<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Kind;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'name' => 'admin',
            'address' => 'Ha Noi',
            'phone' => '0123456789',
            'isAdmin' => true,
            'isActive' => true,
        ]);

        Kind::create([
            'name' => 'Sa hình',
        ]);
        Kind::create([
            'name' => 'Biển báo giao thông',
        ]);
        Kind::create([
            'name' => 'Luật giao thông',
        ]);
    }
}
