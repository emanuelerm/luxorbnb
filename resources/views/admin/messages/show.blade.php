@extends('layouts.app')

@section('content')
    <div class="d-flex" id=wrapper>
        @include('partials.sidebar')
        <div id="page-content-wrapper" class="text-white p-5">
            <i class="fas fa-align-left primary-text fs-4 mb-5" id="menu-toggle"></i>
            <div class="card p-5 bg-dark text-white">
                <div class="row">
                    <div class="col-6">
                        <h4>Dettagli Messaggio</h4>
                    </div>
                    <div class="d-flex col-6 justify-content-end">
                        <p>{{ $message->created_at }}</p>
                    </div>
                </div>
                <div class="message">
                    <h2>Titolo: {{ $message->title }}</h2>
                    <p class="fs-5"><span class="fw-bold">Da: </span>{{ $message->email }}</p>
                    <p class="fs-5"><span class="fw-bold">Messaggio: </span>{{ $message->message }}</p>
                    <div class=" d-flex justify-content-center align-items-center gap-4">
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Torna indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>

</style>
