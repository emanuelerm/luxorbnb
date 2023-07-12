<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        // Recupera tutti i messaggi dal database
        $messages = Message::all();

        // Restituisci i messaggi come risposta JSON
        return response()->json([
            'success' => true,
            'messages' => $messages,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'property_id' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->property_id = $validatedData['property_id'];
        $message->title = $validatedData['title'];
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];
        $message->save();

        return response()->json([
            'success' => true,
            'result' => 'Messaggio inviato con successo',
        ]);
    }
}
