<x-layout>
    <h2>Hier können Sie einen neuen Eintrag anlegen.<h2>
    <form method="POST" action="/bookentrys">
        @csrf
        <input name="title" placeholder="Hier Titel eingeben...">
        @error('title')
		    <p class="error-text">Bitte geben Sie einen Titel ein!</p>
	    @enderror
        <textarea name="text" placeholder="Hier Text eingeben..."></textarea>
        @error('text')
		    <p class="error-text">Bitte geben Sie einen Text ein!</p>
	    @enderror
        <button type="submit">Hinzufügen</button>
    </form>
</x-layout>