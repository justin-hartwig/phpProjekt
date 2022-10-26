<x-layout>
    @foreach ($bookEntrys as $entry)
        @if($entry->released)
            <x-bookentry :entry='$entry'/>
        @endif
    @endforeach
    <a href="/bookentrys/create"><button class="btn btn-primary">Neuen Gästebucheintrag anlegen</button></a>
</x-layout>