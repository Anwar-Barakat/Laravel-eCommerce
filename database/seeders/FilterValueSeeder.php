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
        $fabric     = Filter::select('id')->where('name', 'Fabric')->first();
        $pattern    = Filter::select('id')->where('name', 'Pattern')->first();

        $ram            = Filter::select('id')->where('name', 'RAM')->first();
        $screen_size    = Filter::select('id')->where('name', 'Screen Size')->first();
        $operation_sys  = Filter::select('id')->where('name', 'Operation Systen')->first();

        $material       = Filter::select('id')->where('name', 'Material')->first();
        $cable          = Filter::select('id')->where('name', 'Cable Feature')->first();

        $filters_values = [
            [
                'filter_id'     => $sleeve->id,
                'value'         => 'Full Sleeve',
            ],
            [
                'filter_id'     => $sleeve->id,
                'value'         => '3/4 Sleeve',
            ],
            [
                'filter_id'     => $sleeve->id,
                'value'         => 'Half Sleeve',
            ],
            [
                'filter_id'     => $sleeve->id,
                'value'         => 'Cap Sleeve',
            ],
            [
                'filter_id'     => $sleeve->id,
                'value'         => 'Short Sleeve',
            ],
            [
                'filter_id'     => $sleeve->id,
                'value'         => 'Sleeveless',
            ],
            // _______________
            [
                'filter_id'     => $fabric->id,
                'value'         => 'Cotton',
            ],
            [
                'filter_id'     => $fabric->id,
                'value'         => 'Polyester',
            ],
            [
                'filter_id'     => $fabric->id,
                'value'         => 'Wool',
            ],
            // _______________
            [
                'filter_id'     => $pattern->id,
                'value'         => 'Checked',
            ],
            [
                'filter_id'     => $pattern->id,
                'value'         => 'Plain',
            ],
            [
                'filter_id'     => $pattern->id,
                'value'         => 'Printed',
            ],
            [
                'filter_id'     => $pattern->id,
                'value'         => 'Self',
            ],
            [
                'filter_id'     => $pattern->id,
                'value'         => 'Solid',
            ],
            // _______________
            [
                'filter_id'     => $ram->id,
                'value'         => '4GB',
            ],
            [
                'filter_id'     => $ram->id,
                'value'         => '8GB',
            ],
            // _______________
            [
                'filter_id'     => $operation_sys->id,
                'value'         => 'IOS',
            ],
            [
                'filter_id'     => $operation_sys->id,
                'value'         => 'Android',
            ],
            [
                'filter_id'     => $operation_sys->id,
                'value'         => 'Windows Phone',
            ],
            // _______________
            [
                'filter_id'     => $screen_size->id,
                'value'         => 'Up to 3.9 in',
            ],
            [
                'filter_id'     => $screen_size->id,
                'value'         => 'Up to 3.9 in',
            ],
            [
                'filter_id'     => $screen_size->id,
                'value'         => '4 to 4.4 in',
            ],
            [
                'filter_id'     => $screen_size->id,
                'value'         => '4.5 to 4.9 in',
            ],
            [
                'filter_id'     => $screen_size->id,
                'value'         => '5 to 5.4 in',
            ],
            [
                'filter_id'     => $screen_size->id,
                'value'         => '5.5 to 5.9 in',
            ],
            // _______________
            [
                'filter_id'     => $material->id,
                'value'         => 'Acrylonitrile Butadiene Styrene (ABS)',
            ],
            [
                'filter_id'     => $material->id,
                'value'         => 'Aluminum',
            ],
            [
                'filter_id'     => $material->id,
                'value'         => 'Leather',
            ],
            [
                'filter_id'     => $material->id,
                'value'         => 'Plastic',
            ],
            [
                'filter_id'     => $material->id,
                'value'         => 'Stainless Steel',
            ],
            // _______________
            [
                'filter_id'     => $cable->id,
                'value'         => 'Retractable',
            ],
            [
                'filter_id'     => $cable->id,
                'value'         => 'Without Cable',
            ],
        ];

        foreach ($filters_values as $filter_value) {
            if (is_null(FilterValue::where(['value' => $filter_value['value'], 'filter_id' => $filter_value['filter_id']])->first())) {
                FilterValue::create($filter_value);
            }
        }
    }
}
