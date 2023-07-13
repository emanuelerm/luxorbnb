@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Select the Properties you want to sponsor</h1>
                <div class="col-4">
                    <ul class="list-group">
                        @foreach ($properties as $property)
                        <div class="d-flex">
                            <li class="list-group-item">{{$property->title}}</li>
                            <input type="checkbox" name="properties_to_delete[]" value="{{ $property->id }}">
                        </div>
                        @endforeach
                    </ul>
                </div>
                <div class="col-8">
                    <form action="/" id="my-sample-form" class="d-flex">
                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" name="payment_method_nonce" />

                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv"/>

                        <label for="expiration-date">Expiration Date</label>
                        <input type="text" id="expiration-date"/>

                        <input id="my-submit" type="submit" value="Pay" />
                    </form>
                </div>
                <button class="btn btn-primary" type="submit">Sponsor</button>
        </div>
    </div>
@endsection
