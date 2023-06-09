<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            // Categoría: Jeans
            [
                'category_id' => 1,
                'name' => 'Jeans Pitillo',
                'slug' => Str::slug('Jeans Pitillo'),
                'color' => true,
                'size' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Jeans Clásicos',
                'slug' => Str::slug('Jeans Clásicos'),
                'color' => true,
                'size' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Sketchers',
                'slug' => Str::slug('Sketchers'),
                'color' => true,
                'size' => true
            ],
            // Categoría: Pijamas
            [
                'category_id' => 4,
                'name' => 'Pijama niños',
                'slug' => Str::slug('Pijama niños'),
                'size' => true
            ],
            [
                'category_id' => 4,
                'name' => 'Pijama damas',
                'slug' => Str::slug('Pijama damas'),
                'size' => true
            ],
            // Categoría: Casacas
            [
                'category_id' => 3,
                'name' => 'Casacas de cuero',
                'slug' => Str::slug('Casacas de cuero'),
                'color' => true
            ],
            [
                'category_id' => 3,
                'name' => 'Casacas Denim',
                'slug' => Str::slug('Casacas Denim'),
                'size' => true
            ],
            // Categoría: Blusas
            [
                'category_id' => 2,
                'name' => 'Blusas manga corta',
                'slug' => Str::slug('Blusas manga corta'),
                'color' => true
            ],
            [
                'category_id' => 2,
                'name' => 'Blusas transparentes',
                'slug' => Str::slug('Blusas transparentes'),
                'size' => true
            ],
            [
                'category_id' => 2,
                'name' => 'Blusas de gasa',
                'slug' => Str::slug('Blusas de gasa'),
                'size' => true
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
