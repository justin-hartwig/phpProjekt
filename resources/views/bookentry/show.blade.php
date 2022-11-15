<x-layout>
    <div class="col-12">
        <h1 class="text-center py-5">Gästebucheintrag</h1>
    </div>
    <x-bookentry :entry='$bookEntry' :users='$users' width='full-width'/>
    @auth
        <div class="button-wraper d-flex flex-wrap">
            <a href="/Eintraege/erstellen"><button class="btn btn-primary btn-icon"><img src="/images/icons/plus.svg" alt="Icon hinzufügen">Neuen Gästebucheintrag anlegen</button></a>
            <a href="/Eintraege/{{$bookEntry->id}}/bearbeiten"><button class="btn btn-primary btn-icon"><img src="/images/icons/pencil.svg" alt="Icon bearbeiten">Eintrag bearbeiten</button></a>
            <form method="POST" action="/Eintraege/{{$bookEntry->id}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-icon"><img src="/images/icons/trash.svg" alt="Icon löschen">Eintrag löschen</button>
            </form>
        </div>
    @endauth
</x-layout>