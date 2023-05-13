<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Section;
use Faker\Factory;
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
        $faker          = Factory::create();
        $men_section    = Section::where('name->en', 'Men')->first()->id;
        $house_section  = Section::where('name->en', 'Houseware')->first()->id;
        $categories = [
            [
                'section_id'        => $men_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'احذية',
                    'en'    => 'Shoes',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => Str::slug('shoes', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $men_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'قمصان',
                    'en'    => 'Shirts',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => Str::slug('shirts', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $house_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'الأدوات اليدوية',
                    'en'    => 'Hand Tools',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => Str::slug('Hand Tools', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
        ];

        foreach ($categories as $category) {
            if (is_null(Category::where('url', $category['url'])->first()))
                Category::create($category);
        }
    }
}
