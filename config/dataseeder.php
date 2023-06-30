<?php

return [
    'properties' => [
        [
        "id" => 1,
        "title" => "Appartamento accogliente nel centro della città",
        "description" => "Lorem ipsum dolor sit amet e...vafangul",
        "rooms" => 2,
        "beds" => 3,
        "bathrooms" => 1,
        "square_meters" => 80,
        "address" => "Via Roma, 123",
        "latitude" => 41.9028,
        "longitude" => 12.4964,
        "visible" => true,
        ]
    ],

    $user = [
        "id" => 1,
        "email" => "user@example.com",
        "password" => "password",
        "name" => "mioNome",
        "lastname" => "MioCognome",
        "date_of_birth" => "1990-01-01",


    ],

    $message = [
        "id" => 1,
        "apartment_id" => 1,
        "mitente_email" => "user@example.com",
        "message" => "Mi interessa affittare l appartamento.",

    ],

    'offers' => [
        "name" => "bronze",
        "duration" => 24,
        "price" => 2.99,
        "start_date" => "2023-06-28 12:00:00",
        "end_date" => "2023-06-29 12:00:00",
    ],
];

