@props(['entry', 'width'])
@if ($width === 'full-width')
    <div class="col-12">
        <div class="book-entry">
            <a href="/bookentrys/{{$entry->id}}"><h2>{{$entry->title}}</h2></a>
            <p>{{$entry->text}}</p>
        </div>
    </div>
@else
    <div class="col-12 col-md-6">
        <div class="book-entry">
            <a href="/bookentrys/{{$entry->id}}"><h2>{{$entry->title}}</h2></a>
            <p>{{$entry->text}}</p>
        </div>
    </div>
@endif