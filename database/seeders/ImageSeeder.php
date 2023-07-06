<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = config('dataseeder.images');

        foreach ($images as $image) {
            $newImage = new Image();
            $newImage->property_id = $image['property_id'];
            $newImage->path = $image['path'];
            $newImage->save();
        }
    }
}
