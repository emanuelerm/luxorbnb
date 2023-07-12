<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('images', 'services')->paginate(5);

        return response()->json([
            'success' => true,
            'results' => $properties,
        ]);
    }

    public function show($id)
    {
        $property = Property::with('images', 'services')->where('id', $id)->first();

        return response()->json([
            'success' => true,
            'results' => $property,

        ]);
    }
}
