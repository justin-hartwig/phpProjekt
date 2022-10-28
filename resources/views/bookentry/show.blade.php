<x-layout>
    <div class="col-12">
        <h1 class="text-center py-5">Gästebucheintrag</h1>
    </div>
    @if($bookEntry->released)
        <x-bookentry :entry='$bookEntry' width='full-width'/>
    @endif
    @auth
        <a href="/bookentrys/create"><button class="btn btn-primary">Neuen Gästebucheintrag anlegen</button></a>
        <a href="/bookentrys/{{$bookEntry->id}}/edit"><button class="btn btn-primary">Eintrag bearbeiten</button></a>
        <form method="POST" action="/bookentrys/{{$bookEntry->id}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eintrag löschen</button>
        </form>
    @endauth
</x-layout>