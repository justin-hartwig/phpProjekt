<x-layout>
    @if($bookEntry->released)
        <x-bookentry :entry='$bookEntry'/>
    @endif
    <a href="/bookentrys/create"><button>Neuen Gästebucheintrag anlegen</button></a>
    <a href="/bookentrys/{{$bookEntry->id}}/edit"><button>Eintrag bearbeiten</button></a>
</x-layout>