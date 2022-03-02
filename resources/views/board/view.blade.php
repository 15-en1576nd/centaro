<h1>{{$board->name}}</h1>
<p>Type: {{$board->type}}</p>

<br><br>
Members:
@foreach($board->board_users as $user)

    >{{$user->name}}
    {{$user->surname}}

@endforeach
!
<form method="post" action="{{route('board.destroy', $board->id) }}">
    @method('DELETE')
    @csrf
<input type="submit" value="Destroy">
</form>

