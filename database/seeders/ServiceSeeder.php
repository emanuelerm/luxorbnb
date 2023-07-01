<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'WiFi',
            'Posto Macchina',
            'Piscina',
            'Portineria',
            'Sauna',
            'Vista Mare',
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->name = $service;
            $newService->save();
        }
    }
}
