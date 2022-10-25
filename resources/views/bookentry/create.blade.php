<x-layout>
    <h2>Hier können Sie einen neuen Eintrag anlegen.<h2>
    <form method="POST" action="/bookentrys">
        @csrf
        <input name="title" placeholder="Hier Titel eingeben..." value="{{old('title')}}">
        @error('title')
		    <p class="error-text">Bitte geben Sie einen Titel ein!</p>
	    @enderror
        <textarea name="text" placeholder="Hier Text eingeben..." value="{{old('text')}}"></textarea>
        @error('text')
		    <p class="error-text">Bitte geben Sie einen Text ein!</p>
	    @enderror
        <button type="submit">Eintrag einreichen</button>
    </form>
</x-layout>