<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offers = config('dataseeder.offers');

        foreach($offers as $offer) {
            $newOffer = new Offer();
            $newOffer->name = $offer['name'];
            $newOffer->duration = $offer['duration'];
            $newOffer->price = $offer['price'];
        }
    }
}
