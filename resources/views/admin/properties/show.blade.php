@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mx-auto mt-5" style="width: 20rem">
            @if ($property->image)
                 <img src="{{ $property->image->path }}" alt="Immagine proprietà">
            @else
                <small class="text-center mt-4">Nessuna immagine disponibile</small>
            @endif
            <div class="card-body text-center mt-4">
                <h3 class="card-title mb-4 ">{{ $property->title }}</h3>
                <p class="card-text"><span class="fw-bold">Description: </span>{{ $property->description }}</p>
                <p class="card-text"><span class="fw-bold">Rooms:</span> {{ $property->rooms }}</p>
                <p class="card-text"><span class="fw-bold">Beds:</span> {{ $property->beds }}</p>
                <p class="card-text"><span class="fw-bold">Bathrooms: </span>{{ $property->bathrooms }}</p>
                <p class="card-text"><span class="fw-bold">Square Meters: </span>{{ $property->square_meters }}</p>
                <p class="card-text"><span class="fw-bold">Address:</span> {{ $property->address }}</p>
                @if ($property->services && count($property->services) > 0)
                <h5>Servizi Disponibili:</h5>
                    <ul class="d-flex">
                        @foreach ($property->services as $service)
                           <li class="list-unstyled p-1"><a href="#"
                                class="badge text-decoration-none rounded-pill text-bg-info">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
                <div class="d-flex justify-content-center align-item-center mt-2 ">
                    <a class="btn btn-primary" href="{{ route('admin.properties.index') }}">Torna indietro</a>
                </div>
            </div>
        </div>
    </div>
@endsection
