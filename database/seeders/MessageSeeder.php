<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Property;
use App\Models\User;

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
        $users = User::all();
        // Define the messages to be seeded
        $messages = [
            [
                'title' => 'Interested in your property',
                'email' => 'jorge@example.com',
                'message' => 'Hello, I am interested in your apartment.',
                'property_id' => $properties->random()->id,
                'user_id' => $users->random()->id,


            ],
            [
                'title' => 'Availability inquiry',
                'email' => 'emanuele@example.com',
                'message' => 'Is the apartment available for rent next month?',
                'property_id' => $properties->random()->id,
                'user_id' => $users->random()->id,

            ],

        ];


        foreach ($messages as $messageData) {
            $message = new Message();
            $message->title = $messageData['title'];
            $message->email = $messageData['email'];
            $message->message = $messageData['message'];
            $message->property_id = $messageData['property_id'];
            $message->user_id = $messageData['user_id'];
            $message->save();
        }
    }
}
