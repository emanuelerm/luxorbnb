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
        $user = Auth::user();
        $messages = $user->messages;

        return view('admin.messages.index')->with('messages', $messages);
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
    public function store(StoreMessageRequest $request, Property $property)
    {

        $validatedData = $request->validate([

            'title' => 'required',
            'email' => 'required|email',
            'message' => 'required',

        ]);
        // $user = Auth::user();
        // $property = Property::findOrFail($id);

        $message = new Message();
        $message->title = $validatedData['title'];
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];
        $message->property_id = $property->id; // Assegna l'ID della proprietà
        $message->user_id = Auth::id();
        $message->save();

        // $property->messages()->save($message);
        // dd($property);
        return redirect()->route('admin.properties.show', ['property' => $property->id])
        ->with('success', 'Messaggio inviato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $property = $message->property;
        // $user = Auth::user();
        // $messages = $user->messages()->get();

        return view('admin.messages.show', compact('message', 'property'));
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
