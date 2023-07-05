<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SettingSeeder::class,
            UserSeeder::class,
            SectionSeeder::class,
            CategorySeeder::class,

            BrandSeeder::class,
            ProductSeeder::class,
            BannerSeeder::class,
            FilterSeeder::class,
            FilterValueSeeder::class,

            CountrySeeder::class,
            ShippingChargeSeeder::class,
            CurrencySeeder::class,

            OrderStatusSeeder::class,
            ColorSeeder::class,

            RoleSeeder::class,
        ]);
    }
}
