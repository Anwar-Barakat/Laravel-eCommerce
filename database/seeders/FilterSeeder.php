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
        $men_shirt      = Category::select('id')->where('url', 'men-t-shirts')->first();
        $women_shirt    = Category::select('id')->where('url', 'women-t-shirts')->first();
        $women_blouses  = Category::select('id')->where('url', 'blouses-and-shirts')->first();

        $mobile         = Category::select('id')->where('url', 'mobile-phones')->first();
        $tablet         = Category::select('id')->where('url', 'tablets')->first();
        $laptop         = Category::select('id')->where('url', 'laptops')->first();

        $filters        = [
            [
                'categories'    => [$men_shirt->id, $women_shirt->id, $women_blouses->id],
                'name'          => 'Cotton',
            ],
            [
                'categories'    => [$men_shirt->id, $women_shirt->id],
                'name'          => 'Sleeve',
            ],
            [
                'categories'    => [$mobile->id, $tablet->id, $laptop->id],
                'name'          => 'RAM',
            ],
        ];

        foreach ($filters as $filter) {
            if (is_null(Filter::where('name', $filter['name'])->first())) {
                Filter::create($filter);
            }
        }
    }
}
