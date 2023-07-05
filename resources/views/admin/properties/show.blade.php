@extends('layouts.app')

@section('content')
@vite('resources/scss/partials/show.scss')
    <div class="container d-flex justify-content-center align-items-center gap-4 ">
        <div class="card w-50  mx-auto mt-3">

            @if ($images->count() > 0)
                <div id="imageCarousel" class="carousel slide card-image" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($images as $key => $image)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }} position-relative">
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Property Image" width="700px" class="card-img">
                                <form action="{{ route('admin.image.destroy', $image->id) }}" method="POST" class="ms-5 position-absolute">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="delete-button btn btn-danger text-white"
                                        data-item-title="{{ $image->id }}"> <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>

                        @endforeach
                    </div>
                     <h2 class="card-title m-4">{{ $property->title }}</h2>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @else
                <small class="text-center m-5">Nessuna immagine disponibile</small>
            @endif

    </div>
    <div class="card-body card-body-content w-50 border m-3 p-3">
        <div class="text-center">
                <h5>Description:</h5>
             </div>
                <p class="card-text"><span class="fw-bold"></span>{{ $property->description }}</p>

                <p class="card-text"><span class="fw-bold">Rooms:</span> {{ $property->rooms }}</p>
                <p class="card-text"><span class="fw-bold">Beds:</span> {{ $property->beds }}</p>
                <p class="card-text"><span class="fw-bold">Bathrooms: </span>{{ $property->bathrooms }}</p>
                <p class="card-text"><span class="fw-bold">Square Meters:</span> {{ $property->square_meters }}</p>
                <p class="card-text"><span class="fw-bold">Address: </span>{{ $property->address }}</p>
                @if ($property->services && count($property->services) > 0)
                    <h5 class="text-center">Servizi Disponibili:</h5>
                    <ul class="d-flex align-items-center text-center flex-wrap">
                        @foreach ($property->services as $service)
                            <li class="list-unstyled p-1"><a href="#"
                                    class="badge text-decoration-none rounded-pill text-bg-info">{{ $service->name }}</a>
                            </li>

                        @endforeach
                    </ul>
                @endif
                <div class="d-flex justify-content-center align-items-center mt-2">
                    <a class="btn btn-primary" href="{{ route('admin.properties.index') }}">Torna indietro</a>
                </div>
            </div>
    @include('partials.modal-delete')
@endsection
