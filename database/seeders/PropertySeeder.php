<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = config('dataseeder.properties');

        foreach($properties as $property) {
            $newProperty = new Property();
            $newProperty->user_id = $property['id'];
            $newProperty->title = $property['title'];
            $newProperty->description = $property['description'];
            $newProperty->rooms = $property['rooms'];
            $newProperty->beds = $property['beds'];
            $newProperty->bathrooms = $property['bathrooms'];
            $newProperty->square_meters = $property['square_meters'];
            $newProperty->address = $property['address'];
            $newProperty->latitude = $property['latitude'];
            $newProperty->longitude = $property['longitude'];
            $newProperty->slug = $property['slug'];
            $newProperty->visible = $property['visible'];
            $newProperty->save();
        }
    }
}
