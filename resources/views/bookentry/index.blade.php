<x-layout>
    <div class="col-12">
        <h1 class="text-center py-5">Gästebuch</h1>
    </div>
    @foreach ($bookEntrys as $entry)
        @if($entry->released)
            <x-bookentry :entry='$entry' :users='$users' width='normal'/>
        @endif
    @endforeach
    @auth
        <a href="/Eintraege/erstellen"><button class="btn btn-primary mt-3">Neuen Gästebucheintrag anlegen</button></a>
    @endauth
</x-layout>