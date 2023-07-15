@extends('layouts.app')
@section('content')
	@include('partials.modal-delete')
	@vite('resources/js/modal.js')
	<div class="d-flex" id=wrapper>

		@include('partials.sidebar')
		<div id="page-content-wrapper">
			<nav class="navbar navbar-light bg-transparent py-4 px-4">
				<div class="d-flex align-items-center">
					<i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
					<h2 class="fs-2 m-0 text-white">Properties</h2>
				</div>

				<div class="">
                    <a class="btn btn-dashboard text-white text-capitalize" href="{{route('admin.generate-token')}}">sponsor your properties</a>
                    <a class="btn btn-dashboard text-white" href="http://localhost:5174/"> Go to frontend</a>
					<a class="btn btn-dashboard text-white" href="{{ route('admin.properties.create') }}">Create new property</a>
				</div>

			</nav>

			<div class="container-fluid px-4">

				<div class="row g-3 my-2">
					@if (session()->has('message'))
						<div class="alert alert-success">
							{{ session()->get('message') }}
						</div>
					@endif
					<div class="col-md-3">
						<div class="p-4 card-color shadow-sm d-flex justify-content-around align-items-center rounded">
							<div class="text-white">
								<p class="fs-5">Actions</p>
							</div>
							<i class="fa-regular fa-circle-play fs-1 primary-text border rounded-full secondary-bg p-3"></i>
						</div>
					</div>

					<div class="col-md-3">
						<div class="p-3 card-color shadow-sm d-flex justify-content-around align-items-center rounded">
							<div class="text-white">
								<h3 class="fs-2">2</h3>
								<p class="fs-5">Star</p>
							</div>
							<i class="fa-regular fa-star fs-1 primary-text border rounded-full secondary-bg p-3"></i>
						</div>
					</div>

					<div class="col-md-3">
						<div class="p-3 card-color shadow-sm d-flex justify-content-around align-items-center rounded">
							<div class="text-white">
								<h3 class="fs-2">38</h3>
								<p class="fs-5">Watch</p>
							</div>
							<i class="fa-solid fa-eye fs-1 primary-text border rounded-full secondary-bg p-3"></i>
						</div>
					</div>

					<div class="col-md-3">
						<div class="p-3 card-color shadow-sm d-flex justify-content-around align-items-center rounded">
							<div class="text-white">
								<h3 class="fs-2">%25</h3>
								<p class="fs-5">Insights</p>
							</div>
							<i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid px-4">
				<div class="table-responsive">
					<table class=" table table-dark">
						<thead>
							<tr class="card-color">
								{{-- <th scope="col">ID</th>
								<th scope="col">User_id</th> --}}
								<th scope="col">Title</th>
								<th scope="col">Description</th>
								<th scope="col">Rooms</th>
								<th scope="col">Beds</th>
								<th scope="col">Bathrooms</th>
								<th scope="col">Square meters</th>
								<th scope="col">Address</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($properties as $property)
									<tr>
										{{-- <th scope="row">{{ $property->id }}</th>
										<td>{{ $property->user_id }}</td> --}}
										<td>{{ $property->title }}</td>
										<td class="description-cell">{{ $property->description }}</td>
										<td>{{ $property->rooms }}</td>
										<td>{{ $property->beds }}</td>
										<td>{{ $property->bathrooms }}</td>
										<td>{{ $property->square_meters }}</td>
										<td>{{ $property->address }}</td>
										<td>
											<div class="d-flex flex-wrap justify-content-between align-items-center">
												<a href="{{ route('admin.properties.show', ['property' => $property->slug]) }}"
													class="btn btn-primary text-white mb-2">
													<i class="fa-regular fa-eye me-1"></i>
												</a>
												<a href="{{ route('admin.properties.edit', ['property' => $property->slug]) }}"
													class="btn btn-warning text-white mb-2">
													<i class="fa-regular fa-pen-to-square me-1"></i>
												</a>
												<form action="{{ route('admin.properties.destroy', $property->slug) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type='submit' class="delete-button btn btn-danger text-white" data-item-title="{{ $property->name }}">
														<i class="fa-solid fa-trash"></i>
													</button>
												</form>
											</div>
										</td>
									</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ $properties->links('vendor.pagination.bootstrap-4') }}
			</div>
		</div>
	</div>
	@include('partials.modal-delete')
@endsection
<style>
	.description-cell {
		max-width: 200px;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}
</style>
