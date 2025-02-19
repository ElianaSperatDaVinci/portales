<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'role_fk' => 1,
                'name' => 'Admin',
                'email' => 'admin@istrador.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'role_fk' => 2,
                'name' => 'Eliana Sperat',
                'email' => 'eliana@comun.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'role_fk' => 2,
                'name' => 'Romina Sperat',
                'email' => 'romina@comun.com',
                'password' => Hash::make('1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
