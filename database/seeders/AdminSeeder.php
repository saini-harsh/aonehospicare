<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::truncate();
        Admin::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@aonehospicare.com',
            'password' => Hash::make('Admin@Aone2024'),
        ]);
    }
}
