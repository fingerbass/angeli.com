<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        \App\Models\User::factory(10)->create();

//        \App\Models\User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        Storage::deleteDirectory('public/categories');
        Storage::makeDirectory('public/categories');

        Storage::deleteDirectory('public/subcategories');
        Storage::makeDirectory('public/subcategories');

        Storage::deleteDirectory('public/products');
        Storage::makeDirectory('public/products');

        $this->call(UserSeeder::class);
        Team::factory(5)->create();
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);

        $this->call(SizeSeeder::class);

        $this->call(ColorSizeSeeder::class);

        $this->call(DepartmentSeeder::class);
    }
}
