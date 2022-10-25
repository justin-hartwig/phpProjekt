<x-layout>
    @if($bookEntry->released)
        <x-bookentry :entry='$bookEntry'/>
    @endif
    <a href="/bookentrys/create"><button>Neuen Gästebucheintrag anlegen</button></a>
</x-layout>