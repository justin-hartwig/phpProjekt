<x-layout>
    <div class="col-12">
        <h1 class="text-center py-5">Gästebuch</h1>
    </div>
    <div class="col-12">
        <input class="search mb-4 w-100" type="search" name="search" id="search" placeholder="Suche">
    </div>
    <div class="container">
        <div class="book-entrys row">
            @foreach ($bookEntrys as $entry)
                @if($entry->released)
                    <x-bookentry :entry='$entry' :users='$users' width='normal'/>
                @endif
            @endforeach
        </div>
    </div>
    @auth
        <a href="/Eintraege/erstellen"><button class="btn btn-primary btn-icon mt-3"><img src="/images/icons/plus.svg" alt="Icon hinzufügen">Neuen Gästebucheintrag anlegen</button></a>
    @endauth
</x-layout>