<x-layout>
    @foreach ($bookEntrys as $entry)
        @if($entry->released)
            <x-bookentry :entry='$entry'/>
        @endif
    @endforeach
    <a href="/bookentrys/create"><button>Neuen Gästebucheintrag anlegen</button></a>
</x-layout>