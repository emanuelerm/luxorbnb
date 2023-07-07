@extends('layouts.app')
@section('script')
	<link rel="stylesheet" type="text/css"
		href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
	<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
	</script>
	<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
	</script>
@endsection
<title>Aggiunge Propietà</title>

@vite(['resources/js/tomtomconfig.js', 'resources/scss/partials/searchboxTomTom.scss', 'resources/js/validation-create.js'])
@section('content')
<div class="d-flex" id=wrapper>

    @include('partials.sidebar')

    <div id="page-content-wrapper">
		<div class="container p-3" style="width: 70%">
			<div class="card bg-dark text-white">
				<div class="card-body p-5">
					<h5 class="card-title fw-bold fs-3">Crea nuova propietà</h5>
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
							<div class="">
								<input type="hidden" name="user_id" value="{{ Auth::id() }}">
								{{-- TITLE IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="title">title *</label>

									<div class="col-md-6">
										<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
											value="{{ old('title') }}" required>

										@error('title')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //TITLE IMPUT --}}

								{{-- DESCRIPTION IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="description">description *</label>

									<div class="col-md-4">

										<textarea name="description" id="description" cols="30" rows="7"
										 class="form-control @error('description') is-invalid @enderror" value="{{ old('address') }}" required></textarea>
										@error('description')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //DESCRIPTION IMPUT --}}

								{{-- ROOMS IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="rooms">rooms *</label>

									<div class="col-md-6">
										<input id="rooms" type="number" min="1" max="10"
											class="form-control @error('rooms') is-invalid @enderror" name="rooms" value="{{ old('rooms') }}" required>

										@error('rooms')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //ROOMS IMPUT --}}

								{{-- BEDS IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="beds">beds *</label>

									<div class="col-md-6">
										<input id="beds" type="number" min="1" max="20"
											class="form-control @error('beds') is-invalid @enderror" name="beds" value="{{ old('beds') }}" required>

										@error('beds')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //BEDS IMPUT --}}

								{{-- BATHROOM IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="bathrooms">bathrooms *</label>

									<div class="col-md-6">
										<input id="bathrooms" type="number" min="1" max="10"
											class="form-control  @error('bathrooms') is-invalid @enderror" name="bathrooms"
											value="{{ old('bathrooms') }}" required>

										@error('bathrooms')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //BATHROOM IMPUT --}}

								{{-- SQUARE_METERS IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="square_meters">square meters *</label>

									<div class="col-md-6">
										<input id="square_meters" type="number" min="70" max="3000"
											class="form-control @error('square_meters') is-invalid @enderror" name="square_meters"
											value="{{ old('square_meters') }}" required>

										@error('square_meters')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //SQUARE_METERS IMPUT --}}

								{{-- ADDERESS IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<div class="col-md-6">
										<label for="address" class="form-label text-uppercase fw-bold">Indirizzo *</label>
										<div id="address"></div>
									</div>

									@error('address')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
                                {{-- //ADDERESS IMPUT --}}

                                {{-- SERVICES INPUT --}}
                                <div class="m-4 d-flex align-items-center row ">
                                    <div class="form-group">
                                        <p class="text-uppercase fw-bold">Select services: *</p>
                                        <div class="d-flex flex-wrap align-items-center w-100">
                                            @foreach ($services as $service)
                                                <div>
                                                    <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                                                        {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                                    <label for="" class="form-check-label pe-3">{{ $service->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{-- //SERVICES INPUT --}}

                                {{-- IMAGES INPUT --}}
                                <div class="m-4 d-flex align-items-center row ">
                                    <div class="form-group py-3 d-flex flex-column">
                                        <label class="text-uppercase fw-bold" for="images[]">Upload images *</label>
                                        <input class="py-2" type="file" id="images" name="images[]" multiple>
                                        <div id="image-validation-message"></div>
                                    </div>
                                </div>
                                {{-- //IMAGES INPUT --}}
                                <div class="m-4 d-flex align-items-center row ">
                                    <div class="d-flex">
                                        <button id="submit" type="submit" class="btn btn-primary">Add new property</button>
                                        <a href="{{ route('admin.properties.index') }}" class="btn btn-danger ms-3">Go to back</a>
                                    </div>
                                </div>
							</div>
				        </form>
				</div>
			</div>
		</div>
	</div>

	@vite('resources/js/tomtomsetattr.js')
@endsection
