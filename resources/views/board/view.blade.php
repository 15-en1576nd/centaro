<h1>{{$board->name}}</h1>

<h2 style="color: #2563eb">€{{$total}},-</h2>
<p>Type: {{$board->type}}</p>

<br><br>
<a href="/boardusers"><button>edit</button></a>
Members:
@foreach($board->board_users as $user)
    <p>
    {{$user->name}}
        {{$user->surname}}

{{--        {{$user->boardrole->id}}--}}

    </p>
@endforeach

<form method="post" action="{{route('board.destroy', $board->id) }}">
    @method('DELETE')
    @csrf
<input type="submit" value="Destroy">
</form>


