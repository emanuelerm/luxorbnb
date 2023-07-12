<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $propertyId = $request->input('property_id');

        $visits = Visit::where('property_id', $propertyId)->get();

        return response()->json($visits);
    }

    public function store(Request $request)
    {
        $visit = new Visit();
        $visit->property_id = $request->input('property_id');
        $visit->ip_address = $request->input('ip_address');
        $visit->save();

        return 'salvato';
    }
}
