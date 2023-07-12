@extends('layouts.app')

@section('content')
    <h1>Dettagli Messaggio</h1>

    <div class="message">
        <h3>Assunto: {{ $message->title }}</h3>
        <p>Da: {{ $message->email }}</p>
        <p>{{ $message->message }}</p>
        <p>{{ $message->created_at }}</p>

    </div>

@endsection
