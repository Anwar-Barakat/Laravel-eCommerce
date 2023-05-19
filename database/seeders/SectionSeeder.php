<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin      = Admin::select('id')->where('email', 'admin@admin.com')->first();
        $sections   = [
            [
                'name'          => [
                    'en'        => 'Men',
                    'ar'        => "رجال",
                ],
            ],
            [
                'name'          => [
                    'en'        => 'Women',
                    'ar'        => 'نساء',
                ],
            ],
            [
                'name'          => [
                    'en'        => 'Appliances',
                    'ar'        => 'أجهزة وأدوات',
                ],
            ],
            [
                'name'          => [
                    'en'        => 'Foods',
                    'ar'        => 'طعام',
                ],
            ],
            [
                'name'          => [
                    'en'        => 'Houseware',
                    'ar'        => 'الأدوات المنزلية',
                ],
            ],
        ];

        foreach ($sections as $section) {
            if (is_null(Section::where('name->en', $section['name']['en'])->where('name->ar', $section['name']['ar'])->first()))
                Section::create($section);
        }
    }
}
