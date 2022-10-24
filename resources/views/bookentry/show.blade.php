<x-layout>
    @if($bookEntry->released)
        <x-bookentry :entry='$bookEntry'/>
    @endif
</x-layout>