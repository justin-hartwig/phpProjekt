<x-layout>
    <div class="col-12">
        <h1 class="text-center py-5">Ihre Gästebucheinträge</h1>
    </div>
    @if (count($bookEntrys) == 0)
        <p>Kein Eintrag vorhanden.</p>
        @else
        <div class="col-12">
            <div class="book-entry-overview mb-5">
                @foreach ($bookEntrys as $entry)
                    <div class="book-entry d-flex justify-content-between align-items-center">
                        <div class="text-wrapper">
                            <a href="/bookentrys/{{$entry->id}}"><h2 class="mb-3">{{$entry->title}}</h2></a>
                            <p>{{$entry->text}}</p>
                        </div>
                        <div class="button-wraper d-flex">
                            <a href="/bookentrys/{{$entry->id}}/edit"><button class="btn btn-primary">Bearbeiten</button></a>
                            <form method="POST" action="/bookentrys/{{$entry->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Eintrag löschen</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <a href="/bookentrys/create"><button class="btn btn-primary">Neuen Gästebucheintrag anlegen</button></a>
</x-layout>