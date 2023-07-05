@extends('layouts.app')

@section('content')
<div class="d-flex" id="wrapper">
    @include('partials.sidebar')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
        {{ ('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ ('User Dashboard') }}</div>
                    <div class="card-body">
                        <div>
                            <a class="fw-bold text-dark fs-5" href="{{ route('admin.properties.create') }}">Agiungi una proprità</a>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
