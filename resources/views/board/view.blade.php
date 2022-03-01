<h1>{{$board->name}}</h1>
<br><br>
@foreach($board->board_users as $user)
    {{$user->name}}
    {{$user->surname}}
@endforeach
