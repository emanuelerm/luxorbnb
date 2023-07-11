<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Property;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request, Property $property)
    {
        $validatedData = $request;
        $message = new Message();
        $message->title = $validatedData['title'];
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];
        $message->property_id = $validatedData['id'];
        $message->save();

        return response()->json(['message' => 'Messaggio inviato con successo'], 200);
    }
}
