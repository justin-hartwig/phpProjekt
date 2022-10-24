<x-layout>
    @foreach ($bookEntrys as $entry)
        @if($entry->released)
            <x-bookentry :entry='$entry'/>
        @endif
    @endforeach
</x-layout>