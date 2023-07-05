<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Property;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = Property::all();
        // Define the messages to be seeded
        $messages = [
            [
                'title' => 'Interested in your property',
                'email' => 'jorge@example.com',
                'message' => 'Hello, I am interested in your apartment.',
                'property_id' => $properties->random()->id,

            ],
            [
                'title' => 'Availability inquiry',
                'email' => 'emanuele@example.com',
                'message' => 'Is the apartment available for rent next month?',
                'property_id' => $properties->random()->id,

            ],

        ];

        // Insert the messages into the database
        Message::insert($messages);
    }
}
