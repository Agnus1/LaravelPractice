<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Sequence;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = Image::get();
        
        $bannersAttributes = [
            [
                'name' => 'banner1',
                'path' => 'images\test_banner_1.jpg',
            ],
            [
                'name' => 'banner2',
                'path' => 'images\test_banner_2.jpg',
            ],
            [
                'name' => 'banner3',
                'path' => 'images\test_banner_3.jpg',
            ]
        ];

        foreach ($bannersAttributes as $bannerAttributes) {
            $banner = Image::factory()->create($bannerAttributes);
            Banner::factory()->create([
                'image_id' => $banner,
                'title' => $banner->name,
            ]);   
        }
        
        Banner::factory()->count(20)
                         ->state(function ($attributes) use ($images) {
                            return ['image_id' => $images->random()];
                         })
                         ->create();
           
    }
}
