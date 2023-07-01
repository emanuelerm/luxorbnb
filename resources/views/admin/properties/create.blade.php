@extends('layouts.app')

<title>Aggiunge Propietà</title>

@section('content')
    <div class="container p-3" style="width: 70%">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Crea nuova propietà</h5>
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <div class="mb-3">
                        <label for="name">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            id="title" required maxlength="100" minlength="3">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="10"
                            class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rooms" class="form-label">Rooms</label>
                        <input type="number" class="form-control" id="rooms" name="rooms" required>
                    </div>
                    <div class="mb-3">
                        <label for="beds" class="form-label">Beds</label>
                        <input type="number" class="form-control" id="beds" name="beds" required>
                    </div>
                    <div class="mb-3">
                        <label for="bathrooms" class="form-label">Bathrooms</label>
                        <input type="number" class="form-control" id="bathrooms" name="bathrooms" required>
                    </div>
                    <div class="mb-3">
                        <label for="square_meters">Square_meters</label>
                        <input type="number" class="form-control @error('square_meters') is-invalid @enderror"
                            name="square_meters" id="square_meters">
                        @error('square_meters')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group py-3">
                        <p>Seleziona servizi:</p>
                        @foreach ($service as $service)
                            <div>
                                <input type="checkbox" name="serivces[]" value="{{ $service->id }}"
                                    class="form-check-input"
                                    {{ in_array($service->id, old('service', [])) ? 'checked' : '' }}>
                                <label for="" class="form-check-label">{{ $service->name }}</label>
                            </div>
                        @endforeach
                        @error('tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Aggiunge nuova propietà</button>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-danger">Torna in dietro</a>
                </form>
            </div>
        </div>
    </div>
@endsection
