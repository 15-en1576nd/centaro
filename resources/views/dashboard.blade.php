<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
You're logged in! <br> <p style="font-weight: bold"> Welcome, {{ Auth::user()->name . ' ' . Auth::user()->surname }}</p>
<table>
    <tr style="flex-direction: column; display: flex">
        <td>Your unique user id: {{Auth::user()->id}}</td>
        <td>First Name: {{Auth::user()->name}}</td>
        <td>Surname: {{Auth::user()->surname}}</td>
        <td>Email: {{Auth::user()->email}}</td>

    </tr>
</table>
@if(isset(Auth::user()->preference))
    Lang:
{{Auth::user()->preference->lang}}
    Valuta:
{{Auth::user()->preference->valuta}}
@endif

<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button>Logout</button></a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a href="/board/create"><button>Create</button></a> Boards:

@forelse(Auth::user()->board as $board)
    <a style="text-decoration: none" href="/board/{{$board->id}}">
    <div style="background: #2563eb; color:white; display: flex; border: 1px solid black; padding: 2px; display: flex; flex-direction: column; width: max-content; height: auto">
        <h3>{{$board->name}}: {{$board->id}}</h3>
      <p>{{$board->type}}</p>
        @foreach($board->board_users as $user)
           <p style="color: red">{{$user->name}}</p>
        @endforeach
    </div>
    </a>
@empty
    <p style="color: gray">Geen borden gevonden!</p>
@endforelse

</body>
</html>

