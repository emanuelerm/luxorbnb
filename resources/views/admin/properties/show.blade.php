@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mx-auto mt-5" style="width: 20rem">
            @if ($images->count() > 0)
            <h5>Immagini:</h5>
            <div class="image-gallery">
                @foreach ($images as $image)
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Property Image" width="250px">
                    <form action="{{ route('admin.image.destroy', $image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit' class="delete-button btn btn-danger text-white"
                            data-item-title="{{ $image->id }}"> <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                @endforeach
            </div>
        @endif
            <div class="card-body d-flex align-items-center justify-content-center flex-column">
                <h5 class="card-title">{{ $property->title }}</h5>
                <p class="card-text">{{ $property->description }}</p>
                @if ($property->services && count($property->services) > 0)
                <h5>Servizi Disponibili:</h5>
                    <ul class="d-flex align-items-center text-center">
                        @foreach ($property->services as $service)
                           <li class="list-unstyled p-1"><a href="#"
                                class="badge text-decoration-none rounded-pill text-bg-info">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
                <div class="d-flex justify-content-center align-items-center mt-2">
                    <a class="btn btn-primary" href="{{ route('admin.properties.index') }}">Torna indietro</a>
                </div>
            </div>
        </div>
    </div>
    @include('partials.modal-delete')
@endsection
