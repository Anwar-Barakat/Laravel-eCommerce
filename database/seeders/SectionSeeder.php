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
                'id'            => 1,
                'name'          => [
                    'en'        => 'Electronics',
                    'ar'        => "الألكترونيات",
                ],
            ],
            [
                'id'            => 2,
                'name'          => [
                    'en'        => 'Men\'s Clothing',
                    'ar'        => "ملابس رجالية",
                ],
            ],
            [
                'id'            => 3,
                'name'          => [
                    'en'        => 'Women\'s Clothing',
                    'ar'        => 'ملابس نسائية',
                ],
            ],
            [
                'id'            => 4,
                'name'          => [
                    'en'        => 'Food & Supplies',
                    'ar'        => 'طعام و اللوازم',
                ],
            ],
            [
                'id'            => 5,
                'name'          => [
                    'en'        => 'Furniture & Decor',
                    'ar'        => 'الأثاث المنزلي',
                ],
            ],
            [
                'id'            => 6,
                'name'          => [
                    'en'        => 'Sports & Game',
                    'ar'        => 'الرياضات والألعاب',
                ],
            ],
        ];

        foreach ($sections as $section) {
            if (is_null(Section::where('name->en', $section['name']['en'])->where('name->ar', $section['name']['ar'])->first()))
                Section::create($section);
        }
    }
}