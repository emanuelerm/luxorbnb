
@extends('layouts.app')

@section('content')
@if($errors->any())
                <div class="alert alert-danger" role="alert">
                 <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('admin.properties.update', $property->slug) }}" method="POST">
    <div class="container">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $property->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $property->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="rooms">Rooms</label>
                <input type="number" name="rooms" id="rooms" class="form-control" value="{{ $property->rooms }}" required>
            </div>

            <div class="form-group">
                <label for="beds">Beds</label>
                <input type="number" name="beds" id="beds" class="form-control" value="{{ $property->beds }}" required>
            </div>

            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <input type="number" name="bathrooms" id="bathrooms" class="form-control" value="{{ $property->bathrooms }}" required>
            </div>

            <div class="form-group">
                <label for="square_meters">Square Meters</label>
                <input type="number" name="square_meters" id="square_meters" class="form-control" value="{{ $property->square_meters }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $property->address }}" required>
            </div>

            <div class="form-group">
                <p>Seleziona i Servizi:</p>
                <div class="d-flex flex-wrap align-items-center w-100 py-4">

                    @foreach ($services as $service)
                        <div>
                            @if ($errors->any())
                                <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                                    {{ in_array($service->id, old('service', [])) ? 'checked' : '' }}>
                            @else
                                <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                                    {{ $property->services->contains($service) ? 'checked' : '' }}>
                            @endif

                            <label for="" class="form-check-label">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('services')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="number" name="latitude" id="latitude" class="form-control" step="0.000001" value="{{ $property->latitude }}" required>
            </div>

            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="number" name="longitude" id="longitude" class="form-control" step="0.000001" value="{{ $property->longitude }}" required>
            </div> --}}

            <div class="form-group">
                <label for="visible">Visible</label>
                <select name="visible" id="visible" class="form-control">
                    <option value="1" {{ $property->visible ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$property->visible ? 'selected' : '' }}>No</option>
                </select>
            </div>


			<div class="form-group py-3">
				<label class="text-uppercase fw-bold px-2"  for="images[]">Upload images</label>
				<input class="px-3" type="file" id="images" name="images[]" multiple>
			</div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
