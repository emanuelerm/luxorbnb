@extends('layouts.app')

@section('content')

<div class="d-flex" id=wrapper>
   @include('partials.sidebar')
   <div class="overflow-hidden w-100">
<div class=" m-4 text-white ">
 <h1>I Miei Messaggi</h1>
</div>

@if($messages)  

    <div class="container-fluid ">
        <div class="table-responsive">
            <table class="table">
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
               <td> <a href="{{ route('admin.messages.show', ['message' => $message->id]) }}">Visualizza</a></td>
               <td><form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type='submit' class="delete-button btn btn-danger text-white"
                    data-item-title="{{ $message->name }}">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form></td>
            </tbody>
              @endforeach
          </table> 
        </div>
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
