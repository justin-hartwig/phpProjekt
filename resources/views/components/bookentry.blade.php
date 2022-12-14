@props(['entry','users', 'width'])
@if ($width === 'full-width')
    <div class="col-12">
        <div class="book-entry">
            <a href="/Eintraege/{{$entry->id}}">
                <h2>{{$entry->title}}</h2>
                @foreach($users as $user)
                    @if($user->id == $entry->user_id)
                        <p>{{$user->name}}</p>
                    @endif
                @endforeach
                <p>{{$entry->text}}</p>
            </a>
        </div>
    </div>
@else
    <div class="col-12 col-md-6">
        <div class="book-entry">
            <a href="/Eintraege/{{$entry->id}}">
                <h2>{{$entry->title}}</h2>
                @foreach($users as $user)
                    @if($user->id == $entry->user_id)
                        <p>{{$user->name}}</p>
                    @endif
                @endforeach
                <p>{{$entry->text}}</p>
            </a>
        </div>
    </div>
@endif