<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run(): void
    {
        $products = Product::whereHas('subcategory', function (Builder $query) {
            $query->where('color', true)
                ->where('size', false);
        })->get();

        foreach ($products as $product) {
            $product->colors()->attach([
                1 => ['quantity' => fake()->numberBetween(0, 7), 'created_at' => now(), 'updated_at' => now()],
                2 => ['quantity' => fake()->numberBetween(0, 7), 'created_at' => now(), 'updated_at' => now()],
                3 => ['quantity' => fake()->numberBetween(0, 7), 'created_at' => now(), 'updated_at' => now()],
                4 => ['quantity' => fake()->numberBetween(0, 7), 'created_at' => now(), 'updated_at' => now()]
            ]);
        }
    }
}
