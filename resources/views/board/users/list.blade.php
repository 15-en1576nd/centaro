<a href="/boards/{{$board->id}}"><button>terug</button></a>
<form action="/boards/{{$board->id}}/users" method="post">

    @csrf
    <input type="email" name="email" placeholder="email of user">
    <input type="submit" value="Add">
</form>
@foreach($board->board_users as $user)

    {{$user->name}}
    {{$user->surname}}
    <form method="post" action="/boards/{{$board->id}}/users/{{$user->id}}">
        <p>
        @method('DELETE')
        @csrf
        <input type="submit" value="X">
        </p>
    </form>

@endforeach
