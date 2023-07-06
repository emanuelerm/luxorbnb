<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $property = Property::find($id);
        // dd($property);
        return view('admin.messages.create', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request, $id)
    {
        // Validazione dei dati del modulo
        $validatedData = $request->validate([
            'title' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Crea un nuovo messaggio nel database
        $user = Auth::user();
        $property = Property::findOrFail($id);

        $message = new Message();
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];

        // $user->messages()->save($message);
        // $property->messages()->save($message);
        // Message::create([
        //     'title' => $validatedData['title'],
        //     'email' => $validatedData['email'],
        //     'message' => $validatedData['message'],
        //     'property_id' => $id,
        // ]);

        return redirect()->route('admin.properties.show')->with('success', 'Il messaggio è stato inviato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        // $user = Auth::user();
        // $messages = $user->messages()->get();

        return view('admin.messages.show', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
    }
}
