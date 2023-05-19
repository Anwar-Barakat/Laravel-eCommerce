<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Filter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shirt_cat  = Category::select('id')->where('url', 'shirts')->first()->id;
        $products   = [
            [
                'name'          => 'Cotton',
                'field'         => 'cotton',
                'categories'    => [$shirt_cat]
            ],
            [
                'name'          => 'Fiber',
                'field'         => 'fiber',
                'categories'    => [$shirt_cat]
            ],
            [
                'name'          => 'Sleeve',
                'field'         => 'sleeve',
                'categories'    => [$shirt_cat]
            ],
        ];
        foreach ($products as $product) {
            if (is_null(Filter::where('field', $product['field'])->first()))
                Filter::create($product);
        }
    }
}