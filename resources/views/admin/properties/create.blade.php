@extends('layouts.app')
@section('content')
	<div class="card">
		<form action="{{ route('admin.property.store') }}" method="POST">
			@csrf

			{{-- TITLE IMPUT --}}
			<div class="mb-4 row">
				<label for="title" class="col-md-4 col-form-label text-md-right">title</label>

				<div class="col-md-6">
					<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
						value="{{ old('title') }}">

					@error('title')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			{{-- //TITLE IMPUT --}}

			{{-- DESCRIPTION IMPUT --}}
			<div class="mb-4 row">
				<label for="description" class="col-md-4 col-form-label text-md-right">description</label>

				<div class="col-md-4">

					<textarea name="description" id="description" cols="30" rows="7"
					 class="form-control @error('description') is-invalid @enderror" value=""></textarea>
					@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			{{-- //DESCRIPTION IMPUT --}}

			{{-- ROOMS IMPUT --}}
			<div class="mb-4 row">
				<label for="rooms" class="col-md-4 col-form-label text-md-right">rooms</label>

				<div class="col-md-6">
					<input id="rooms" type="number" class="form-control @error('rooms') is-invalid @enderror" name="rooms"
						value="{{ old('rooms') }}">

					@error('rooms')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			{{-- //ROOMS IMPUT --}}

			{{-- BEDS IMPUT --}}
			<div class="mb-4 row">
				<label for="beds" class="col-md-4 col-form-label text-md-right">beds</label>

				<div class="col-md-6">
					<input id="beds" type="number" class="form-control @error('beds') is-invalid @enderror" name="beds"
						value="{{ old('beds') }}">

					@error('beds')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			{{-- //BEDS IMPUT --}}

			{{-- BATHROOM IMPUT --}}
			<div class="mb-4 row">
				<label for="bathroom" class="col-md-4 col-form-label text-md-right">bathroom</label>

				<div class="col-md-6">
					<input id="bathroom" type="number" class="form-control @error('bathroom') is-invalid @enderror" name="bathroom"
						value="{{ old('beds') }}">

					@error('bathroom')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			{{-- //BATHROOM IMPUT --}}

			{{-- SQUARE_METERS IMPUT --}}
			<div class="mb-4 row">
				<label for="square_meters" class="col-md-4 col-form-label text-md-right">square meters</label>

				<div class="col-md-6">
					<input id="square_meters" type="number" class="form-control @error('square_meters') is-invalid @enderror"
						name="square_meters" value="{{ old('square_meters') }}">

					@error('square_meters')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			{{-- //SQUARE_METERS IMPUT --}}

			{{-- ADDERESS IMPUT --}}
			<div class="mb-4 row">
				<label for="address" class="col-md-4 col-form-label text-md-right">address</label>

				<div class="col-md-6">
					<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
						value="{{ old('address') }}">

					@error('address')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			{{-- //ADDERESS IMPUT --}}
		</form>
	</div>
	@endsectionn
