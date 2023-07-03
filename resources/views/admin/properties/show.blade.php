@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mx-auto mt-5" style="width: 20rem">
            @if ($property->image)
                 <img src="{{ $property->image->path }}" alt="Immagine proprietà">
            @else
                <p>Nessuna immagine disponibile</p>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $property->title }}</h5>
                <p class="card-text">{{ $property->description }}</p>
                <p class="card-text">Rooms: {{ $property->rooms }}</p>
                <p class="card-text">Beds: {{ $property->beds }}</p>
                <p class="card-text">Bathrooms: {{ $property->bathrooms }}</p>
                <p class="card-text">Square Meters: {{ $property->square_meters }}</p>
                <p class="card-text">Address: {{ $property->address }}</p>
                @if ($property->services && count($property->services) > 0)
                <h5>Servizi Disponibili:</h5>
                    <ul class="d-flex">
                        @foreach ($property->services as $service)
                           <li class="list-unstyled p-1"><a href="#"
                                class="badge text-decoration-none rounded-pill text-bg-info">{{ $service->name }}</a></li>
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
