@extends('layouts.app')

@section('script')
	<script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
@endsection

@section('content')
	@vite(['resources/scss/partials/dropin.scss', 'resources/js/dropin.js', 'resources/js/checkout.js'])
	<div class="d-flex" id="wrapper">
		@include('partials.sidebar')
		<div id="page-content-wrapper">
			<div class="container pb-5">
				<div class="row pt-3">
					<form id="payment-form" action="{{ route('admin.process-payment') }}" method="post" autocomplete="off">
						@csrf
						<div class="d-flex">
							<div class="col-lg-3 col-md-3 pt-3">
								<h2 class="text-white mb-4">I tuoi appartamenti</h2>
								<p class="text-white">Seleziona i tuoi appartamenti da sponsorizzare *</p>
								<div class="cust overflow-y-auto pe-3">
									@foreach ($properties as $property)
										@php
											$hasOffer = $property->offers->isNotEmpty();
											$isExpired = $property->offers->where('pivot.expired', true)->isNotEmpty();
										@endphp @if (!$hasOffer || $isExpired)
											<div class="card mb-3 d-flex flex-nowrap flex-row position-relative">
												<div class="card-img">
													@if ($property->images->isNotEmpty())
														<img src="{{ asset('storage/' . $property->images->first()->path) }}" alt="{{ $property->title }}">
													@else
														<img src="{{ asset('path_to_placeholder_image') }}" alt="No Image">
													@endif
												</div>
												<div class="card-body ps-2 pt-2">
													<p class="fw-bold">{{ $property->title }}</p>
												</div> <input type="checkbox" name="properties_to_sponsor[]" value="{{ $property->id }}"
													class="position-absolute check-delete">
											</div>
										@endif
									@endforeach
								</div>
							</div>
							<div id="offers" class="col-lg-9 col-md-9 ps-5 p-3">
								<div class="col title text-center text-white mb-4">
									<h2>Le nostre offerte</h2>
								</div>
								<p class="text-white">Seleziona un'offerta *</p>
								<div class="col d-flex flex-nowrap gap-3 pt-4">
									@foreach ($offers as $index => $offer)
										@php
											$offerData = [
											    'bronze' => [
											        'class' => 'bronze',
											        'visite' => '+100% visite',
											        'prenotazioni' => 'Una media di +30% prenotazioni',
											    ],
											    'silver' => [
											        'class' => 'silver',
											        'visite' => '+150% visite',
											        'prenotazioni' => 'Una media di +45% prenotazioni',
											    ],
											    'gold' => [
											        'class' => 'gold',
											        'visite' => '250% visite',
											        'prenotazioni' => 'Una media di +60% prenotazioni',
											    ],
											];
										@endphp

										<div class="card col-4 {{ $offerData[$offer->name]['class'] }}">
											<div class="card-title text-center text-uppercase p-3 fw-bold mb-0">
												<h5 id="offer-name">{{ $offer->name }}</h5>
											</div>
											<div class="card-body pt-2">
												<ul>
													<li>{{ $offerData[$offer->name]['visite'] }}</li>
													<li>{{ $offerData[$offer->name]['prenotazioni'] }}</li>
													<li>Durata di {{ $offer->duration }} ore</li>
													<li>Prezzo esclusivo. Solo <span id="offer-price">{{ $offer->price }}</span>€</li>
												</ul>
												<div class="form-check">
													<label class="form-check-label" for="offer_{{ $index }}">
														Seleziona un'offerta
													</label>
													<input class="form-check-input" type="radio" name="selected_offer" id="offer_{{ $index }}"
														value="{{ $offer->id }}">
												</div>
											</div>
										</div>
									@endforeach
								</div>
								<div id="checkout" class="col">
									<h4 class="text-white mt-4">Riepilogo dell'ordine</h4>
									<div id="selected-properties">
										<p class="text-white">Proprietà selezionate:</p>
										<!-- Dynamic content: selected properties will be appended here -->
									</div>
									<div id="selected-offer">
										<p class="text-white">Offerta selezionata:</p>
										<!-- Dynamic content: selected offer will be displayed here -->
									</div>
									<div id="total-amount">
										<p class="text-white">Totale pagamento:</p>
										<!-- Dynamic content: total payment amount will be displayed here -->
									</div>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-8 col-md-8">

							</div>
							<div class="col-lg-4 col-md-4">
								<div id="dropin-container">

								</div>
								<input type="hidden" id="nonce" name="payment_method_nonce">
								<button id="submit-button" class="button button--small button--green">Purchase</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
