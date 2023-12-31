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
<div class="d-flex" id=wrapper>
    @vite('resources/scss/partials/prop-edit.scss')

    @include('partials.sidebar')

    <div id="page-content-wrapper">

        <form action="{{ route('admin.properties.update', $property->slug) }}" method="POST" enctype="multipart/form-data">
            <div class="container text-white p-5">
                    @csrf
                    @method('PUT')
                    <h2 class=" py-1"> Modifica Proprietà</h2>
                    <div class="form-group py-2">
                        <label for="title">Title *</label>
                        <input type="text" name="title" id="title" class="form-control w-75" value="{{ $property->title }}" required>
                    </div>

                    <div class="form-group py-2">
                        <label for="description">Description *</label>
                        <textarea name="description" id="description" class="form-control w-75" required>{{ $property->description }}</textarea>
                    </div>

                    <div class="form-group py-2">
                        <label for="rooms">Rooms *</label>
                        <input type="number" name="rooms" id="rooms" class="form-control w-75" value="{{ $property->rooms }}" required>
                    </div>

                    <div class="form-group py-2">
                        <label for="beds">Beds *</label>
                        <input type="number" name="beds" id="beds" class="form-control w-75" value="{{ $property->beds }}" required>
                    </div>

                    <div class="form-group py-2">
                        <label for="bathrooms">Bathrooms *</label>
                        <input type="number" name="bathrooms" id="bathrooms" class="form-control w-75" value="{{ $property->bathrooms }}" required>
                    </div>

                    <div class="form-group py-2">
                        <label for="square_meters">Square Meters *</label>
                        <input type="number" name="square_meters" id="square_meters" class="form-control w-75" value="{{ $property->square_meters }}" required>
                    </div>

                    {{-- <div class="form-group py-2">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control w-75" value="{{ $property->address }}" required>
                    </div> --}}

                    <div class="form-group py-2">
                        <h5>Select services: *</h5>
                        <div class="d-flex flex-wrap align-items-center w-100 py-2">

                            @foreach ($services as $service)
                                <div>
                                    @if ($errors->any())
                                        <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                                            {{ in_array($service->id, old('service', [])) ? 'checked' : '' }}>
                                    @else
                                        <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                                            {{ $property->services->contains($service) ? 'checked' : '' }}>
                                    @endif
                                    <label for="" class="form-check-label pe-3">{{ $service->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('services')
                            <div class="invalid-feedback">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="media me-4 gap-3">
                        <h5>Select images to delete:</h5>
                        <div class="d-flex gap-3">
                            @foreach ($property->images as $image)
                                <div id="preview" class="position-relative d-block" style="width: 150px">
                                    <img class="uploadPreview shadow" width="150" src="{{ $image ? asset('storage/' . $image->path) : 'https://via.placeholder.com/300x200' }}" alt="{{ $property->title . '-' .  $image->id }}" data-image-id="{{ $image->id }}">
                                    <input type="checkbox" name="images_to_delete[]" value="{{ $image }}" class="position-absolute check-delete">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group py-3 d-flex flex-column">
                        <label class="text-uppercase fw-bold"  for="images[]">Upload images *</label>
                        <input class="py-2" type="file" id="images" name="images[]" multiple>
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.properties.index') }}" class="btn btn-danger ms-3">Go to back</a>
                    </div>
                </div>
            </form>
    </div>
</div>


@endsection
