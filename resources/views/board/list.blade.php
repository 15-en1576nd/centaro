@foreach(Auth::user()->board as $board)
    <a style="text-decoration: none" href="/boards/{{$board->id}}">
        <div style="background: #2563eb; color:white; display: flex; border: 1px solid black; padding: 2px; display: flex; flex-direction: column; width: max-content; height: auto">
            <h3>{{$board->name}}: {{$board->id}}</h3>

            <p>{{$board->type}}</p>
            @foreach($board->board_users as $user)
                <p style="color: red">{{$user->name}}</p>
            @endforeach
        </div>
    </a>
@endforeach
