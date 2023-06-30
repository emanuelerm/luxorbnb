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
        $images = [
            [
                'property_id' => 1,
                'path' => 'https://gina.al/wp-content/uploads/2018/03/interior-dhe-exterior-apartamenti-1-08-1024x683-768x512.jpg',
            ],

            [
                'property_id' => 2,
                'path' => 'https://i.pinimg.com/originals/54/26/14/542614a4e0394624528849ff775332c7.jpg',
            ],

            [
                'property_id' => 3,
                'path' => 'http://sedes.lv/wp-content/uploads/bfi_thumb/big_img12-30tc54hapk8hg9nh51qnsw.jpg',
            ],
            [
                'property_id' => 4,
                'path' => 'http://cdn4.gestim.biz/custom/01505/foto/20190225103431-9.jpg',
            ],

            [
                'property_id' => 5,
                'path' => 'http://podskoczniazakopane.pl/wp-content/uploads/2019/05/DSC2799.jpg',
            ],
            [
                'property_id' => 6,
                'path' => 'https://www.leotours.it/catalogo/web/media/cache/img_large/uploads/gallery/appartamenti-zero-branco-(tv)-esclusivo-appartamento-in-vendita-a-zero-branco-jesolo-2-53-20.jpg',
            ],

            [
                'property_id' => 7,
                'path' => 'https://www.gianeseagency.com/wp-content/uploads/2018/10/VillaElsaPISCINA.jpg',
            ],

        ];

        foreach ($images as $imagePath) {
            $image = new Image();
            $image->property_id = $imagePath['property_id'];
            $image->path = $imagePath['path'];
            $image->save();
        }
    }
}
