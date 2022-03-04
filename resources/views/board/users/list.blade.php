<a href="/board/{{$board->id}}"><button>terug</button></a>
<form action="{{ route('boardusers.store') }}" method="post">

    @csrf
    <input type="email" name="email" placeholder="email of user">
    <input type="submit" value="Add">
</form>
@foreach($board->board_users as $user)
    <p>
    {{$user->name}}
    {{$user->surname}}
    <form method="post" action="{{route('boardusers.destroy', $user->id) }}">
        @method('DELETE')
        @csrf
        <input type="submit" value="X">
    </form>
    </p>
@endforeach
