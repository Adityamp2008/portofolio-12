<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
    'name' => 'Admin',
    'username' => 'admin',
    'password' => Hash::make(env('ADMIN_PASSWORD')),
    'created_at' => now(),
    'updated_at' => now(),
]);
    }
}
