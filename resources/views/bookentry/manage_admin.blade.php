<x-layout>
    <div class="col-12">
        <h1 class="text-center py-5">Alle Gästebucheinträge</h1>
    </div>
    @if (count($bookEntrys) == 0)
        <p>Kein Eintrag vorhanden.</p>
        @else
        <div class="col-12">
            <div class="book-entry-overview mb-5">
                @foreach ($bookEntrys as $entry)
                    <div class="book-entry mb-2 d-flex justify-content-between align-items-center flex-wrap">
                        <div class="text-wrapper">
                            <a href="/Eintraege/{{$entry->id}}"><h2 class="mb-3">{{$entry->title}}</h2></a>
                            @foreach($users as $user)
                                @if($user->id == $entry->user_id)
                                    <p>{{$user->name}}</p>
                                @endif
                            @endforeach
                            <p class="mb-0">{{$entry->text}}</p>
                        </div>
                        <div class="button-wraper d-flex flex-wrap">
                            <form method="POST" action="/admin/Eintraege/{{$entry->id}}/release">
                                @csrf
                                @method('PUT')
                                @if($entry->released)
                                    <button class="btn btn-primary btn-icon"><img src="/images/icons/removerelease.svg" alt="Icon verbergen">Verbergen</button>
                                @else
                                    <button class="btn btn-primary btn-icon"><img src="/images/icons/release.svg" alt="Icon freigeben">Freigeben</button>
                                @endif
                            </form>
                            <form method="POST" action="/admin/Eintraege/{{$entry->id}}">
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