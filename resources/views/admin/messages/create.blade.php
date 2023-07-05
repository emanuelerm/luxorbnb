<!-- resources/views/messages/create.blade.php -->
<form method="POST" action="{{ route('admin.messages.store', $property->id) }}">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Messaggio:</label>
    <textarea id="message" name="message" required></textarea>

    <button type="submit">Invia messaggio</button>
    <a class="btn btn-primary" href="{{ route('admin.properties.index') }}">Torna indietro</a>
</form>
