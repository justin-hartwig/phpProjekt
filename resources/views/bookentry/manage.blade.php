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
                            <a href="/Eintraege/{{$entry->id}}"><h2 class="mb-3">{{$entry->title}}</h2></a>
                            @foreach($users as $user)
                                @if($user->id == $entry->user_id)
                                    <p>{{$user->name}}</p>
                                @endif
                            @endforeach
                            <p>{{$entry->text}}</p>
                        </div>
                        <div class="button-wraper d-flex flex-wrap">
                            <a href="/Eintraege/{{$entry->id}}/bearbeiten"><button class="btn btn-primary btn-icon"><img src="/images/icons/pencil.svg" alt="Icon bearbeiten">Bearbeiten</button></a>
                            <form method="POST" action="/Eintraege/{{$entry->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-icon"><img src="/images/icons/trash.svg" alt="Icon löschen">Eintrag löschen</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <a href="/Eintraege/erstellen"><button class="btn btn-primary btn-icon mt-3"><img src="/images/icons/plus.svg" alt="Icon hinzufügen">Neuen Gästebucheintrag anlegen</button></a>
</x-layout>