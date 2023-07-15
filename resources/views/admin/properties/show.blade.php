@extends('layouts.app')

@section('content')
    <div id="wrapper">
        <div class="d-flex">
            @include('partials.sidebar')
            @vite('resources/scss/partials/show.scss')
            <div class="container CPM max-100">
                <div class="d-flex justify-content-center align-items-center gap-4 ">
                    <div class="card w-50  mx-auto mt-3">
                        @if ($images->count() > 0)
                            <div id="imageCarousel" class="carousel slide card-image" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($images as $key => $image)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }} position-relative">
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="Property Image"
                                                width="700px" class="card-img">
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
                    <div class="card card-body card-body-content w-50 border m-3 p-3">
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
                                    <li class="list-unstyled p-1">
                                        <a href="#"
                                            class="badge text-decoration-none rounded-pill text-bg-info">{{ $service->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <a class="btn btn-primary" href="{{ route('admin.properties.index') }}">Torna indietro</a>
                        </div>
                    </div>
                </div>

                @include('partials.modal-delete')
                <div class="container pb-5">
                    <div class="tab_container">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1"><i class="fa fa-code"></i><span>Week</span></label>

                        <input id="tab2" type="radio" name="tabs">
                        <label for="tab2"><i class="fa fa-pencil-square-o"></i><span>Month</span></label>

                        <input id="tab3" type="radio" name="tabs">
                        <label for="tab3"><i class="fa fa-bar-chart-o"></i><span>Year</span></label>

                        <section id="content1" class="tab-content">
                            <h3>Queste sono le statistiche dell'ultima settimana</h3>
                            <p>{{ $visit7 }}</p>
                        </section>

                        <section id="content2" class="tab-content">
                            <h3>Headline 2</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </section>

                        <section id="content3" class="tab-content">
                            <h3>Headline 3</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </div>







@endsection
