<h1>{{$board->name}}</h1>
<p>Type: {{$board->type}}</p>

<br><br>
<form action="{{ route('board_users.store') }}" method="post">

    @csrf
    <input type="email" name="email" placeholder="email of user">
    <input type="submit" value="Add">
</form>
Members:
@foreach($board->board_users as $user)
    <p>
    {{$user->name}}
        {{$user->surname}}
    <form method="post" action="{{route('board_users.destroy', $user->id) }}">
        @method('DELETE')
        @csrf
        <input type="submit" value="X">
    </form>
    </p>
@endforeach

<form method="post" action="{{route('board.destroy', $board->id) }}">
    @method('DELETE')
    @csrf
<input type="submit" value="Destroy">
</form>

