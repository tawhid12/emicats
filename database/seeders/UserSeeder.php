<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Constants\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "Admin",
            "email" => "admin@test.com",
            'password' => Hash::make(123456),
            "role"  => Role::ADMIN
        ]);

        User::factory()->create([
            "name" => "Seller",
            "email" => "seller@test.com",
            'password' => Hash::make(123456),
        ]);
    }
}
