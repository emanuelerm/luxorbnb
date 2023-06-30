@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center mb-5">Properties</h1>
    <table class="table table-info table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User_id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Rooms</th>
                <th scope="col">Beds</th>
                <th scope="col">Bathrooms</th>
                <th scope="col">Square meters</th>
                <th scope="col">Address</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Link</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
            @if($property->user_id == $user->id)
            <tr>
                        <th scope="row">{{ $property->id }}</th>
                        <td>{{ $property->user_id }}</td>
                        <td>{{ $property->title }}</td>
                        <td>{{ $property->description }}</td>
                        <td>{{ $property->rooms }}</td>
                        <td>{{ $property->beds }}</td>
                        <td>{{ $property->bathrooms }}</td>
                        <td>{{ $property->square_meters }}</td>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->latitude }}</td>
                        <td>{{ $property->longitude }}</td>
                        <td>
                            <a href="{{ route('admin.properties.show', ['property' => $property->id]) }}">
                                <i class="fa-regular fa-eye me-2"></i>
                            </a>

                            <form action="{{ route('admin.properties.destroy', $property->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="delete-button btn btn-danger text-white"
                                 data-item-title="{{ $property->name }}"> <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @include('partials.modal-delete')
@endsection
