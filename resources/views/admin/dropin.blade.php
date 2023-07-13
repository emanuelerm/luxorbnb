@extends('layouts.app')

@section('script')
    <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
@endsection

@section('content')
@vite('resources/js/dropin.js')
    <div id="dropin-container"></div>
    <form id="payment-form" action="{{ route('admin.process-payment') }}" method="post">
        @csrf
        <input type="submit" value="Paga">
    </form>
@endsection
