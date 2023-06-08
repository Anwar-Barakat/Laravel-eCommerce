<?php

namespace Database\Seeders;

use App\Models\Filter;
use App\Models\FilterValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilterValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sleeve     = Filter::select('id')->where('name', 'Sleeve')->first();
        $cotton     = Filter::select('id')->where('name', 'Cotton')->first();
        $ram        = Filter::select('id')->where('name', 'RAM')->first();

        $filters_values = [
            [
                'filter_id'     => $sleeve->id,
                'value'         => 'Full sleeve',
            ],
            [
                'filter_id'     => $sleeve->id,
                'value'         => '3/4 sleeve',
            ],
            [
                'filter_id'     => $sleeve->id,
                'value'         => 'Cap sleeve',
            ],
            [
                'filter_id'     => $sleeve->id,
                'value'         => 'Short sleeve',
            ],
            [
                'filter_id'     => $sleeve->id,
                'value'         => 'Sleeveless',
            ],
            [
                'filter_id'     => $cotton->id,
                'value'         => 'Comfort',
            ],
            [
                'filter_id'     => $cotton->id,
                'value'         => 'Durability',
            ],
            [
                'filter_id'     => $ram->id,
                'value'         => '4GB',
            ],
            [
                'filter_id'     => $ram->id,
                'value'         => '8GB',
            ],

        ];

        foreach ($filters_values as $filter_value) {
            if (is_null(FilterValue::where(['value' => $filter_value['value'], 'filter_id' => $filter_value['filter_id']])->first())) {
                FilterValue::create($filter_value);
            }
        }
    }
}
