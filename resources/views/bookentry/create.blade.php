<x-layout>
    <div class="col-12">
        <h1 class="text-center py-5">Erstellen</h1>
    </div>
    <form method="POST" action="/Eintraege">
        @csrf
        <div class="d-flex flex-column mb-4">
            <label class="mb-2" for="title">Titel</label>
            <input name="title" placeholder="Hier Titel eingeben..." value="{{old('title')}}">
            @error('title')
                <p class="error-text">{{$message}}</p>
            @enderror
        </div>
        <div class="d-flex flex-column mb-4">
            <label class="mb-2" for="text">Text</label>
            <textarea name="text" placeholder="Hier Text eingeben..." value="{{old('text')}}"></textarea>
            @error('text')
                <p class="error-text">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Eintrag einreichen</button>
    </form>
</x-layout>