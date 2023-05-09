<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Nike', 'Arrow', 'Gap', 'Lee', 'Samsung', 'Apple', 'MI', 'Lenovo', 'ASUS', 'DELL'];

        foreach ($brands as $brand) {
            if (is_null(Brand::where('name', $brand)->first()))
                Brand::create(['name' => $brand]);
        }
    }
}
