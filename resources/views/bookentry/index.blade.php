@extends('layout')

@section('guestbook')
    <h1>Gästebuch</h1>
    @foreach ($bookEntrys as $entry)
        @if($entry->released)
            <x-bookentry :entry='$entry'/>
        @endif
    @endforeach
@endsection