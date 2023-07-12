<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Service;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $service_id = $request->query('service_id');
        $roomsMin = $request->query('rooms');
        $bedsMin = $request->query('beds_min');
        $radius = $request->query('radius');

        $properties = Property::with('services', 'images');
        if (!empty($service_id)) {
            $properties->whereHas('services', function ($query) use ($service_id) {
                $query->where('services.id', $service_id);
            });
        }
        if (!empty($roomsMin)) {
            $properties->where('rooms', '>=', $roomsMin);
        }
        if (!empty($bedsMin)) {
            $properties->where('beds', '>=', $bedsMin);
        }

        // Check if city and radius are provided
        $city = $request->input('address');
        if (!empty($city) && !empty($radius)) {
            // Effettua una richiesta all'API di TomTom per ottenere le coordinate della città
            $client = new Client();
            $response = $client->get("https://api.tomtom.com/search/2/search/{$city}.json", [
                'query' => [
                    'key' => '6Zdz4adkb3YzaPURg8Zg71KMzMez217G',
                    'limit' => 1,
                ],
            ]);

            // Verifica la risposta dall'API di TomTom
            if ($response->getStatusCode() === 200) {
                $data = json_decode($response->getBody(), true);

                // Estrai le coordinate geografiche (latitudine e longitudine) dalla risposta
                $latitude = $data['results'][0]['position']['lat'];
                $longitude = $data['results'][0]['position']['lon'];

                // Calcola il bounding box per il raggio specificato
                $bbox = $this->calculateBoundingBox($latitude, $longitude, $radius);

                // Filtra le proprietà in base al bounding box
                $properties->whereBetween('latitude', [$bbox['minLat'], $bbox['maxLat']])
                    ->whereBetween('longitude', [$bbox['minLng'], $bbox['maxLng']]);
            }
        }

        $properties = $properties->paginate(10);
        $services = Service::all();
        $data = [
            'properties' => $properties,
            'services' => $services,
        ];

        return response()->json([
            'success' => true,
            'results' => $properties,
        ], 200);
    }

    public function show($id)
    {
        $property = Property::with('images', 'services')->where('id', $id)->first();

        return response()->json([
            'success' => true,
            'results' => $property,
        ]);
    }

    private function calculateBoundingBox($latitude, $longitude, $radius)
    {
        $property = Property::with('images', 'services')->get();

        return response()->json([
            'success' => true,
            'results' => $property,
        ]);
        $earthRadius = 6371; // Raggio approssimativo della Terra in km

        $minLat = $latitude - rad2deg($radius / $earthRadius);
        $maxLat = $latitude + rad2deg($radius / $earthRadius);
        $minLng = $longitude - rad2deg($radius / $earthRadius / cos(deg2rad($latitude)));
        $maxLng = $longitude + rad2deg($radius / $earthRadius / cos(deg2rad($latitude)));

        return [
            'minLat' => $minLat,
            'maxLat' => $maxLat,
            'minLng' => $minLng,
            'maxLng' => $maxLng,
        ];
    }
}
