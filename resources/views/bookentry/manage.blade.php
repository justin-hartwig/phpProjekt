<x-layout>
    <h2>Hier können Sie alle Ihre Einträge verwalten.<h2>
    @if (count($bookEntrys) == 0)
        <p>Kein Eintrag vorhanden.</p>
        @else
        @foreach ($bookEntrys as $entry)
            <div class="book-entry">
                <a href="/bookentrys/{{$entry->id}}"><h2>{{$entry->title}}</h2></a>
                <a href="/bookentrys/{{$entry->id}}/edit"><button class="btn btn-primary">Bearbeiten</button></a>
                <form method="POST" action="/bookentrys/{{$entry->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Eintrag löschen</button>
                </form>
            </div>
        @endforeach
    @endif
    <a href="/bookentrys/create"><button class="btn btn-primary">Neuen Gästebucheintrag anlegen</button></a>
</x-layout>