@extends('layouts.app')

@section('content')
    <h1>I Miei Messaggi</h1>

    @foreach ($messages as $message)
        <div>
            <h3>{{ $message->title }}</h3>
            <p>{{ $message->message }}</p>
            <p>{{ $message->created_at }}</p>
        </div>
    @endforeach
@endsection
