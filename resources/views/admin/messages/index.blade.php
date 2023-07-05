@foreach ($messages as $message)
    <div>
        <h1>Messages</h1>
        <h3>{{ $message->title }}</h3>
        <p>{{ $message->email }}</p>
        <p>{{ $message->message }}</p>
    </div>

@endforeach
