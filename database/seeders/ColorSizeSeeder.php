<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = Size::all();
        foreach ($sizes as $size) {
            $size->colors()
                ->attach([
                    1 => ['quantity' => fake()->numberBetween(0, 7), 'created_at' => now(), 'updated_at' => now()],
                    2 => ['quantity' => fake()->numberBetween(0, 7), 'created_at' => now(), 'updated_at' => now()],
                    3 => ['quantity' => fake()->numberBetween(0, 7), 'created_at' => now(), 'updated_at' => now()],
                    4 => ['quantity' => fake()->numberBetween(0, 7), 'created_at' => now(), 'updated_at' => now()],
                ]);
        }
    }
}
