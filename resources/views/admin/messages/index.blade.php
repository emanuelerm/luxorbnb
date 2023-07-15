@extends('layouts.app')

@section('content')
    @include('partials.modal-delete')
    @vite('resources/js/modal.js')
    <div class="d-flex" id=wrapper>
        @include('partials.sidebar')
        <div class="overflow-hidden w-100 p-5 text-white">
            <div class="d-flex align-items-center pb-5">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h1>I Miei Messaggi</h1>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (count($messages) > 0)
            <div class="container-fluid ">
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead>
                            <th>Proprietà</th>
                            <th>E-Mail</th>
                            <th>Ora</th>
                            <th>Messaggio</th>
                            <th>Cancella</th>
                        </thead>
                        @foreach ($messages as $message)
                        <tbody>
                            <td> {{ $message->title }}</td>
                            <td> Da: {{ $message->email }}</td>
                            {{-- <p>{{ $message->message }}</p> --}}
                            <td>{{ $message->created_at }}</td>
                            <td> <a
                                    href="{{ route('admin.messages.show', ['message' => $message->id]) }}">Visualizza</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="delete-button btn btn-danger text-white"
                                        data-item-title="{{ $message->name }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                @else
                <h2 class="text-white text-center pt-5">Non ci sono messaggi</h2>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .message-box {
        background-color: white;
        display: flex;
        flex-wrap: wrap;
    }


    @media (max-width: 768px) {
        .message {
            flex-basis: 100%;
        }
    }
</style>
