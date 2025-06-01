<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'admin',
            'password' => Hash::make('123aDmin@'),
            'email' => 'admin@gmail.com',
            'role' => '1',
        ]);
        User::create([
            'name' => 'user',
            'password' => Hash::make('123uSer@'),
            'email' => 'user@gmail.com',
        ]);
    }
}
