@extends('layouts.app')

@section('content')
    <h1>I Miei Messaggi</h1>

    <div class="message-box">
        @foreach ($messages as $message)
            <div class="message">
                <h3>Assunto: {{ $message->title }}</h3>
                <p> Da: {{ $message->email }}</p>
                {{-- <p>{{ $message->message }}</p> --}}
                <p>{{ $message->created_at }}</p>
                <a href="{{ route('admin.messages.show', ['message' => $message->id]) }}">Visualizza</a>
            </div>
        @endforeach
    </div>
@endsection
<style>
    .message-box {
        display: flex;
        flex-wrap: wrap;
    }

    .message {
        background-color: #f9f9f9;
        padding: 20px;
        margin: 10px;
        flex: 1 0 300px;
        min-width: 250px;
    }

    @media (max-width: 768px) {
        .message {
            flex-basis: 100%;
        }
    }
</style>
