<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
            'roles' => 'admin',
            'id_warung' => 0,
        ]);

        \App\Models\User::create([
            'name' => 'Penjual',
            'email' => 'penjual@gmail.com',
            'password' => Hash::make('penjual12345'),
            'roles' => 'penjual',
            'id_warung' => 0,
        ]);

        \App\Models\User::create([
            'name' => 'Pemilik',
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('pemilik12345'),
            'roles' => 'pemilik',
            'id_warung' => 0,
        ]);
    }
}
