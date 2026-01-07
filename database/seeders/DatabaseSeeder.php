<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 1. Create 10 Random Staff members
        \App\Models\User::factory(10)->staff()->create();

        // 2. Create 20 Random Student members
        \App\Models\User::factory(20)->create();

        // 3. Create your specific test student (Ariena)
        \App\Models\User::factory()->create([
            'name' => 'Ariena Sofea',
            'email' => 'ariena@example.com',
            'matric_number' => '1234567',
            'password' => bcrypt('123456'),
            'role' => 'student',
        ]);

        // 4. Create  specific test Staff (Admin)
        \App\Models\User::factory()->create([
            'name' => 'Staff Admin',
            'email' => 'staff@test.com',
            'matric_number' => 'STAFF123',
            'password' => bcrypt('123456'),
            'role' => 'staff',
        ]);
    }
}