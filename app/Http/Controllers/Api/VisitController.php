<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        // $propertyId = $request->input('property_id');

        // $visits = Visit::where('property_id', $propertyId)->get();
        $visits = Visit::all();

        return response()->json($visits);
    }

    public function store(Request $request)
    {
        $propertySlug = $request->input('property_slug');

        if (!$propertySlug) {
            return response()->json(['error' => 'Property slug is required'], 400);
        }

        $property = Property::where('slug', $propertySlug)->first();

        if (!$property) {
            return response()->json(['error' => 'Property not found'], 404);
        }

        $visit = new Visit();
        $visit->property_id = $property->id;
        $visit->ip_address = $request->input('ip_address');
        $visit->save();

        return response()->json(['message' => 'Visit saved successfully'], 200);
    }
}
