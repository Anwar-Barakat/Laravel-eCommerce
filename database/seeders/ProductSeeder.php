<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker      = Factory::create();
        $section    = Section::where('name->en', 'Men')->first();
        $category   = Category::where('name->en', 'Shirts')->first();
        $brand      = Brand::where('name', 'Gap')->first();
        $admin      = Admin::where('email', 'admin@admin.com')->first();
        $products = [
            [
                'section_id'        => $section->id,
                'category_id'       => $category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص اسود كاجول',
                    'en'    => 'Black casual t-shirt',
                ],
                'code'              => uniqid(),
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 1,
                'is_best_seller'    => true,
            ],
            [
                'section_id'        => $section->id,
                'category_id'       => $category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص أبيض كاجول',
                    'en'    => 'White casual t-shirt',
                ],
                'code'              => uniqid(),
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'section_id'        => $section->id,
                'category_id'       => $category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص اسود ',
                    'en'    => 'Black t-shirt',
                ],
                'code'              => uniqid(),
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'section_id'        => $section->id,
                'category_id'       => $category->id,
                'brand_id'          => $brand->id,
                'admin_id'          => $admin->id,
                'name'              => [
                    'ar'    => 'قميص رمادي ',
                    'en'    => 'Gray t-shirt',
                ],
                'code'              => uniqid(),
                'price'             => rand(10, 100),
                'discount_type'     => 0,
                'weight'            => rand(10, 1000),
                'description'       => $faker->sentence(15),
                'meta_title'        => $faker->title,
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
        ];
        foreach ($products as $product) {
            if (is_null(Product::where(['code' => $product['code']])->first()))
                Product::create($product);
        }
    }
}