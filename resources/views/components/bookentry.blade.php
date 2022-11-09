@props(['entry','users', 'width'])
@if ($width === 'full-width')
    <div class="col-12">
        <div class="book-entry">
            <a href="/bookentrys/{{$entry->id}}"><h2>{{$entry->title}}</h2></a>
            @foreach($users as $user)
                @if($user->id == $entry->user_id)
                    <p>{{$user->name}}</p>
                @endif
            @endforeach
            <p>{{$entry->text}}</p>
        </div>
    </div>
@else
    <div class="col-12 col-md-6">
        <div class="book-entry">
            <a href="/bookentrys/{{$entry->id}}"><h2>{{$entry->title}}</h2></a>
            @foreach($users as $user)
                @if($user->id == $entry->user_id)
                    <p>{{$user->name}}</p>
                @endif
            @endforeach
            <p>{{$entry->text}}</p>
        </div>
    </div>
@endif