<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory(24)->create()->each(function (Department $department) {
            City::factory(rand(12,18))->create([
                'department_id' => $department->id
            ])->each(function (City $city) {
                District::factory(rand(15,32))->create([
                    'city_id' => $city->id
                ]);
            });
        });
    }
}
