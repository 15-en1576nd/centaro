<h1>{{$board->name}}</h1>
<p>Type: {{$board->type}}</p>

<br><br>
Members:
@foreach($board->board_users as $user)

    >{{$user->name}}
    {{$user->surname}}

@endforeach
