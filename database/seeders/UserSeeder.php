<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(50)
            ->hasPet(rand(1,2))
            ->create();

        User::factory()
            ->count(40)
            ->hasPet(rand(2,5))
            ->create();

        User::factory()
            ->count(30)
            ->hasPet(rand(5,15))
            ->create();
    }
}
