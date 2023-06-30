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
            <th scope="col">Number of rooms</th>
            <th scope="col">Beds</th>
            <th scope="col">Bathrooms</th>
            <th scope="col">Square meters</th>
            <th scope="col">Address</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col">Visible</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
            <tr>
              <th scope="row">{{ $property->id }}</th>
              <td>{{ $property->user_id }}</td>
              <td>{{ $property->title }}</td>
              <td>{{ $property->description }}</td>
              <td>{{ $property->number_of_rooms }}</td>
              <td>{{ $property->beds }}</td>
              <td>{{ $property->bathrooms }}</td>
              <td>{{ $property->square_meters }}</td>
              <td>{{ $property->address }}</td>
              <td>{{ $property->latitude }}</td>
              <td>{{ $property->longitude }}</td>
              <td>{{ $property->visible === 1? 'Yes' : 'No' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
