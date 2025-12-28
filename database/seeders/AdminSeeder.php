<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@university.edu',
            'password' => Hash::make('password123'),
            
            // 👇 ADD THIS LINE to fix the error
            'phoneNumber' => '1234567890', 
        ]);
    }
}