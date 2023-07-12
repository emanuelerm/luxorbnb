@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-5">
            @foreach ($offers as $offer)
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Package: {{$offer->name}}</h3>
                        <h4>Price: {{$offer->price}} €</h4>
                        <h4>Duration: {{$offer->duration}} hours</h4>
                        <button class="btn btn-success"><a class="text-decoration-none text-white" href="{{route('admin.offers.show', ['offer' => $offer->id])}}">Choose property to sponsor</a></button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
