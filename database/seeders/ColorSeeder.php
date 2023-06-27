<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = ['Red', 'Green', 'Yellow', 'Purple', 'Gray', 'Black', 'White', 'Blue', 'Brown', 'Violet', 'Orange'];

        foreach ($colors as $color) {
            if (is_null(Color::where('name', $color)->first()))
                Color::create(['name' => $color]);
        }
    }
}
