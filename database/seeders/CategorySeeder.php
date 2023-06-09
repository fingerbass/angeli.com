<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Jeans',
                'slug' => Str::slug('Jeans'),
                'icon' => '<i class="fa-solid fa-hat-cowboy"></i>',
            ],
            [
                'name' => 'Blusas',
                'slug' => Str::slug('Blusas'),
                'icon' => '<i class="fa fa-light fa-person-dress"></i>',
            ],
            [
                'name' => 'Casacas',
                'slug' => Str::slug('Casacas'),
                'icon' => '<i class="fa-solid fa-vest"></i>',
            ],
            [
                'name' => 'Pijamas',
                'slug' => Str::slug('Pijamas'),
                'icon' => '<i class="fa-solid fa-shirt"></i>',
            ]
        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }
    }
}
