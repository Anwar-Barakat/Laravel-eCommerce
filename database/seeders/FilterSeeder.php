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
        $men_shirt_category     = Category::select('id')->where('url', 'men-shirts')->first();
        $women_shirt_category   = Category::select('id')->where('url', 'women-shirts')->first();

        $filters = [
            [
                'categories'    => [$men_shirt_category->id, $women_shirt_category->id],
                'name'          => 'Cotton',
                'field'         => 'cotton',
            ],
            [
                'categories'    => [$men_shirt_category->id, $women_shirt_category->id],
                'name'          => 'Sleeve',
                'field'         => 'sleeve',
            ],
            [
                'categories'    => [$men_shirt_category->id, $women_shirt_category->id],
                'name'          => 'Fiber',
                'field'         => 'fiber',
            ],
        ];

        foreach ($filters as $filter) {
            if (is_null(Filter::where('name', $filter['name'])->first())) {
                Filter::create($filter);
            }
        }
    }
}