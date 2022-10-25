<x-layout>
    <h2>Hier können Sie ihren Eintrag bearbeiten.<h2>
    <form method="POST" action="/bookentrys/{{$bookentry->id}}">
        @csrf
        @method('PUT')
        <input name="title" placeholder="Hier Titel eingeben..." value="{{$bookentry->title}}">
        @error('title')
		    <p class="error-text">Bitte geben Sie einen Titel ein!</p>
	    @enderror
        <textarea name="text" placeholder="Hier Text eingeben...">{{$bookentry->text}}</textarea>
        @error('text')
		    <p class="error-text">Bitte geben Sie einen Text ein!</p>
	    @enderror
        <button type="submit">Bearbeiteten Eintrag einreichen</button>
    </form>
</x-layout>