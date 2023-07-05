<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'title' => 'Spring Collection',
                'link'  => 'spring-collection',
            ],
            [
                'title' => 'Winter Collection',
                'link'  => 'winter-collection',
            ],
            [
                'title' => 'Tops',
                'link'  => 'tops',
            ],
        ];

        foreach ($banners as $banner) {
            if (is_null(Banner::where('link', $banner['link'])->first()))
                Banner::create($banner);
        }
    }
}
