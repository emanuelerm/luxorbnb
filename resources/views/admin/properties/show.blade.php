@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        @include('partials.sidebar')
        <div class="card mx-auto mt-5" id="page-content-wrapper" style="width: 20rem">
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
            <div class="card-body">
                <h5 class="card-title">{{ $property->title }}</h5>
                <p class="card-text">{{ $property->description }}</p>
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
                    <a href="{{ route('admin.messages.create', ['id' => $property->id]) }}">Invia messaggio</a>
                </div>
            </div>
        </div>
    </div>
    @include('partials.modal-delete')
@endsection
