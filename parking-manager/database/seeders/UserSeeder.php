<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->count(count: 3)->create()->each(function ($user) {
            \App\Models\Car::factory()->count(count: 4)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
