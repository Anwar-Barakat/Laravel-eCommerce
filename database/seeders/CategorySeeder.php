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
        $faker                  = Factory::create();
        $electronic_section     = Section::find(1)->id;
        $men_section            = Section::find(2)->id;
        $women_section          = Section::find(3)->id;

        $categories = [
            [
                'id'                => 1,
                'section_id'        => $electronic_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'طابعة ومستلزمات ثلاثية الأبعاد',
                    'en'    => '3D PRINTER & SUPPLIES',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('3D PRINTER & SUPPLIES', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 2,
                'section_id'        => $electronic_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'مشغلات الوسائط',
                    'en'    => 'MEDIA PLAYERS',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('MEDIA PLAYERS', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 3,
                'section_id'        => $electronic_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'التصوير الفوتوغرافي والكاميرا',
                    'en'    => 'PHOTOGRAPHY & CAMERA',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('PHOTOGRAPHY & CAMERA', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 4,
                'section_id'        => $women_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'الفئات العامة',
                    'en'    => 'GENERAL CATEGORIES',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('GENERAL CATEGORIES', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 5,
                'section_id'        => $women_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'حفلات الزفاف والأحداث',
                    'en'    => 'WEDDING & EVENTS',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('WEDDING & EVENTS', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 6,
                'section_id'        => $women_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'الجزء السفلي',
                    'en'    => 'BOTTOMS',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('BOTTOMS', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 7,
                'section_id'        => $women_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'سترات نسائية',
                    'en'    => 'WOMEN JACKETS',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('WOMEN JACKETS', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 8,
                'section_id'        => $women_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'اكسسوارات نسائية',
                    'en'    => 'WOMEN ACCESSORIES',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('WOMEN ACCESSORIES', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 9,
                'section_id'        => $men_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'الأكثر مبيعًا',
                    'en'    => 'BEST SELLER',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('BEST SELLER', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 10,
                'section_id'        => $electronic_section,
                'parent_id'         => 0,
                'name'              => [
                    'ar'    => 'أجهزة محمولة',
                    'en'    => 'MOBILE DEVICES',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('MOBILE DEVICES', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 1,
                'name'              => [
                    'ar'    => 'طابعة ثلاثية الأبعاد',
                    'en'    => '3D PRINTER',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('3D PRINTER', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 1,
                'name'              => [
                    'ar'    => 'قلم طباعة ثلاثي الأبعاد',
                    'en'    => '3d Printing Pen',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('3d Printing Pen', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 1,
                'name'              => [
                    'ar'    => 'ملحقات الطباعة ثلاثية الأبعاد',
                    'en'    => '3d Printing Accessories',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('3d Printing Accessories', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 2,
                'name'              => [
                    'ar'    => 'سماعات',
                    'en'    => 'Earphones',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Earphones', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 2,
                'name'              => [
                    'ar'    => 'مشغلات MP3',
                    'en'    => 'Mp3 Players',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Mp3 Players', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 2,
                'name'              => [
                    'ar'    => 'مكبرات الصوت والراديو',
                    'en'    => 'Speakers and Radios',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Speakers and Radios', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 2,
                'name'              => [
                    'ar'    => 'ميكروفونات',
                    'en'    => 'Microphones',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Microphones', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 3,
                'name'              => [
                    'ar'    => 'الكاميرات الرقمية',
                    'en'    => 'Digital Cameras',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Digital Cameras', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 3,
                'name'              => [
                    'ar'    => 'ملحقات الكاميرا',
                    'en'    => 'Camera Accessories',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Camera Accessories', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 3,
                'name'              => [
                    'ar'    => 'العدسات والاكسسوارات',
                    'en'    => 'Lenses and Accessories',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Lenses and Accessories', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $women_section,
                'parent_id'         => 4,
                'name'              => [
                    'ar'    => 'فساتين',
                    'en'    => 'Dresses',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Dresses', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 4,
                'name'              => [
                    'ar'    => 'البلوزات والقمصان',
                    'en'    => 'Blouses and Shirts',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Blouses and Shirts', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 4,
                'name'              => [
                    'ar'    => 'قمصان نسائية',
                    'en'    => 'Women T-shirts',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Women T-shirts', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $women_section,
                'parent_id'         => 5,
                'name'              => [
                    'ar'    => 'فساتين زفاف',
                    'en'    => 'Wedding Dresses',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Wedding Dresses', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 5,
                'name'              => [
                    'ar'    => 'فساتين زهرة',
                    'en'    => 'Flower Dresses',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Flower Dresses', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $women_section,
                'parent_id'         => 6,
                'name'              => [
                    'ar'    => 'تنانير',
                    'en'    => 'Skirts',
                ],
                'discount'          => 0,

                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Skirts', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 6,
                'name'              => [
                    'ar'    => 'جينز',
                    'en'    => 'Jeans',
                ],
                'discount'          => 0,

                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Jeans', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 6,
                'name'              => [
                    'ar'    => 'السراويل القصيرة',
                    'en'    => 'Shorts',
                ],
                'discount'          => 0,

                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Shorts', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $women_section,
                'parent_id'         => 7,
                'name'              => [
                    'ar'    => 'سترات الدينيم',
                    'en'    => 'Denim Jackets',
                ],
                'discount'          => 0,

                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Denim Jackets', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 7,
                'name'              => [
                    'ar'    => 'جاكيتات جلدية',
                    'en'    => 'Leather Jackets',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Leather Jackets', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $women_section,
                'parent_id'         => 8,
                'name'              => [
                    'ar'    => 'حقائب نسائية',
                    'en'    => 'Women bags',
                ],
                'discount'          => 0,

                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Women bags', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 8,
                'name'              => [
                    'ar'    => 'محافظ نسائية',
                    'en'    => 'Women Wallets',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Women Wallets', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $women_section,
                'parent_id'         => 8,
                'name'              => [
                    'ar'    => 'ساعات نسائية',
                    'en'    => 'Women Watches',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Women Watches', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $men_section,
                'parent_id'         => 9,
                'name'              => [
                    'ar'    => 'تي شيرت رجالي',
                    'en'    => 'Men T-Shirts',
                ],
                'discount'          => 0,

                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Men T-Shirts', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $men_section,
                'parent_id'         => 9,
                'name'              => [
                    'ar'    => 'كنزات رجالي',
                    'en'    => 'Men Sweaters',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Men Sweaters', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 10,
                'name'              => [
                    'ar'    => 'هواتف نقالة',
                    'en'    => 'Mobile Phones',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Mobile Phones', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 10,
                'name'              => [
                    'ar'    => 'أجهزة لوحية',
                    'en'    => 'Tablets',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Tablets', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'section_id'        => $electronic_section,
                'parent_id'         => 10,
                'name'              => [
                    'ar'    => 'أجهزة الكمبيوتر المحمولة',
                    'en'    => 'Laptops',
                ],
                'discount'          => 0,
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Laptops', '-'),
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
