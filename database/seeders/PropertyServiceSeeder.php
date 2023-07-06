<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Models\Service;

class PropertyServiceSeeder extends Seeder
{
    public function run()
    {
        $propertyIds = Property::pluck('id')->all();
        $serviceIds = Service::pluck('id')->all();

        foreach ($propertyIds as $propertyId) {
            shuffle($serviceIds);
            $selectedServiceIds = array_slice($serviceIds, 0, rand(3, 4));

            foreach ($selectedServiceIds as $serviceId) {
                DB::table('property_service')->insert([
                    'property_id' => $propertyId,
                    'service_id' => $serviceId,
                ]);
            }
        }
    }
}
