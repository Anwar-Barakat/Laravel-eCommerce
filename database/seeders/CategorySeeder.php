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
        $men_section    = Section::select('id')->where('name->en', 'Men')->first()->id;
        $women_section  = Section::select('id')->where('name->en', 'Women')->first()->id;
        $house_section  = Section::select('id')->where('name->en', 'Houseware')->first()->id;

        $categories = [
            [
                'section_id'        => $men_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'أحذية رجالية',
                    'en'    => 'Men Shoes',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => Str::slug('men shoes', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'أحذية نسائية',
                    'en'    => 'Women Shoes',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => Str::slug('women shoes', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $men_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'قمصان رجالية',
                    'en'    => 'Men Shirts',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => Str::slug('men shirts', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'قمصان نسائية',
                    'en'    => 'Women Shirts',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => Str::slug('women shirts', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'مكياجات',
                    'en'    => 'Makeup',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(30),
                'url'               => Str::slug('makeup', '-'),
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
                'url'               => Str::slug('hand tools', '-'),
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
