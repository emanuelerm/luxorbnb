@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mx-auto mt-5" style="width: 20rem">
            @if ($property->image)
                 <img src="{{ asset($property->image->path) }}" alt="Immagine proprietà">
            @else
                <p>Nessuna immagine disponibile</p>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $property->title }}</h5>
                <p class="card-text">{{ $property->description }}</p>
                @if ($property->services && count($property->services) > 0)
                <h2>Servizi Disponibili:</h2>
                    <ul>
                        @foreach ($property->services as $service)
                           <li><a href="#"
                                class="badge rounded-pill text-bg-info">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
                <div class="d-flex justify-content-between align-content-center mt-2">
                    <a class="btn btn-primary" href="{{ route('admin.properties.index') }}">Torna indietro</a>
                </div>
            </div>
        </div>
    </div>
@endsection
