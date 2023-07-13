@extends('layouts.app')

@section('script')
	<script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
@endsection

@section('content')
	@vite('resources/scss/partials/dropin.scss', 'resources/js/dropin.js')
	<form id="payment-form" action="{{ route('admin.process-payment') }}" method="post" autocomplete="off">
		@csrf

		<div id="dropin-container">

		</div>
		<input type="hidden" id="nonce" name="payment_method_nonce">
		<button id="submit-button" class="button button--small button--green">Purchase</button>
	</form>
@endsection
