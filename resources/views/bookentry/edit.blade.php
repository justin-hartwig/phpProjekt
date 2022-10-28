<x-layout>
    <div class="col-12">
        <h1 class="text-center py-5">Bearbeiten</h1>
    </div>
    <form method="POST" action="/bookentrys/{{$bookentry->id}}">
        @csrf
        @method('PUT')
        <label for="title">Titel</label>
        <input name="title" placeholder="Hier Titel eingeben..." value="{{$bookentry->title}}">
        @error('title')
		    <p class="error-text">{{$message}}</p>
	    @enderror
        <label for="text">Text</label>
        <textarea name="text" placeholder="Hier Text eingeben...">{{$bookentry->text}}</textarea>
        @error('text')
		    <p class="error-text">{{$message}}</p>
	    @enderror
        <button type="submit" class="btn btn-success">Bearbeiteten Eintrag einreichen</button>
    </form>
</x-layout>