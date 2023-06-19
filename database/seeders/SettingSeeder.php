<?php

namespace Database\Seeders;

use App\Models\Setting;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        
        $setting = [
            'name'          => 'Rmark',
            'email'         => 'rmark@store.net',
            'address'       => $faker->address(),
            'mobile'        => $faker->phoneNumber(),
            'facebook_url'  => $faker->url(),
            'instagram_url' => $faker->url(),
            'twitter_url'   => $faker->url(),
            'footer'        => 'Copyright © 2023 Rmark All Right Reserved',
        ];

        if (is_null(Setting::where('email', $setting['email'])->first()))
            Setting::create($setting);
    }
}