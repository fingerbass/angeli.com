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
        User::factory()->create([
            'name' => 'Elías Valderrama De La Cruz',
            'email' => 'u20308747@utp.edu.pe',
            'password' => bcrypt('12345678'),
            'current_team_id' => 1,
        ]);
    }
}
