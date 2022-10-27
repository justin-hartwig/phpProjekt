<x-layout>
    <h2>Hier können Sie einen neuen Eintrag anlegen.<h2>
    <form method="POST" action="/bookentrys">
        @csrf
        <label for="title">Titel</label>
        <input name="title" placeholder="Hier Titel eingeben..." value="{{old('title')}}">
        @error('title')
		    <p class="error-text">{{$message}}</p>
	    @enderror
        <label for="text">Text</label>
        <textarea name="text" placeholder="Hier Text eingeben..." value="{{old('text')}}"></textarea>
        @error('text')
		    <p class="error-text">{{$message}}</p>
	    @enderror
        <button type="submit" class="btn btn-success">Eintrag einreichen</button>
    </form>
</x-layout>