<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Super Admin Test User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superadmin@example.com')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Admin Test User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin@example.com')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $productManager = User::create([
            'name' => 'Product Manager Test User',
            'email' => 'manager@example.com',
            'password' => Hash::make('manager@example.com')
        ]);
        $productManager->assignRole('Product Manager');

        // Creating User
        $user = User::create([
            'name' => 'User Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('user@example.com')

        ]);

    }
}
