<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(StoreMessageRequest $request, Property $property)
    {

        $validatedData = $request->validated();
        dd($validatedData);
        $message = new Message();
        $message->title = $validatedData['title'];
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];
        $message->property_id = $property->id;
        $message->user_id = $property->user_id;
        $message->save();

        return response()->json(['message' => 'Messaggio inviato con successo'], 200);
    }
}
