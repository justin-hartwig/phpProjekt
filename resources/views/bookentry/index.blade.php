<x-layout>
    @foreach ($bookEntrys as $entry)
        @if($entry->released)
            <x-bookentry :entry='$entry' width='normal'/>
        @endif
    @endforeach
    @auth
        <a href="/bookentrys/create"><button class="btn btn-primary mt-3">Neuen Gästebucheintrag anlegen</button></a>
    @endauth
</x-layout>