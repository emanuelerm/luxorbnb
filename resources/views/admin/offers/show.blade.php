@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Select the Properties you want to sponsor</h1>
            <form action="{{route('admin.offers.store')}}" method="post">
                <div class="col-4">
                    <ul class="list-group">
                        @foreach ($properties as $property)
                        <div class="d-flex">
                            <li class="list-group-item">{{$property->title}}</li>
                            <input type="checkbox" name="properties_to_delete[]" value="{{ $property->id }}">
                        </div>
                        @endforeach
                    </ul>
                </div>
                <div class="col-8">

                </div>
                <button class="btn btn-primary" type="submit">Sponsor</button>
            </form>
        </div>
    </div>
@endsection
