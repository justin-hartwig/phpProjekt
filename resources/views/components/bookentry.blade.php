@props(['entry'])
<div class="book-entry">
    <a href="/bookentrys/{{$entry->id}}"><h2>{{$entry->title}}</h2></a>
    <p>{{$entry->userid}}</p>
    <p>{{$entry->text}}</p>
</div>
