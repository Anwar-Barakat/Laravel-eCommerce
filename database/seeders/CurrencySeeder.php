<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currenciesRecords = [
            [
                'name'              => [
                    'ar'    => 'الليرة السورية',
                    'en'    => 'Syrian Pound'
                ],
                'code'              => 'Lira',
                'exchange_rate'     => 1,
            ],
            [
                'name'              => [
                    'ar'    => 'يورو',
                    'en'    => 'Euro'
                ],
                'code'              => 'EUR',
                'exchange_rate'     => 9500,
            ],
            [
                'name'              => [
                    'ar'    => 'دولار أمريكي',
                    'en'    => 'U.S. Dollar'
                ],
                'code'              => 'USA',
                'exchange_rate'     => 8500,
            ],
            [
                'name'              => [
                    'ar'    => 'جنيه أسترليني',
                    'en'    => 'Australian Pound'
                ],
                'code'              => 'AUD',
                'exchange_rate'     => 6400,
            ],
        ];

        foreach ($currenciesRecords as $currency) {
            if (is_null(Currency::where('code', $currency['code'])->first())) {
                Currency::create($currency);
            }
        }
    }
}
