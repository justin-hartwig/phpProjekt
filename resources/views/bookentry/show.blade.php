<x-layout>
    <div class="col-12">
        <h1 class="text-center py-5">Gästebucheintrag</h1>
    </div>
    <x-bookentry :entry='$bookEntry' :users='$users' width='full-width'/>
    @auth
        <div class="button-wraper d-flex flex-wrap">
            <a href="/Eintraege/erstellen"><button class="btn btn-primary">Neuen Gästebucheintrag anlegen</button></a>
            <a href="/Eintraege/{{$bookEntry->id}}/bearbeiten"><button class="btn btn-primary">Eintrag bearbeiten</button></a>
            <form method="POST" action="/Eintraege/{{$bookEntry->id}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eintrag löschen</button>
            </form>
        </div>
    @endauth
</x-layout>