@extends('parts.main')
@section('title', 'Dashboard')
@section('content')
<h1 class="text-gray-600 font-bold text-xl">Welcome {{ Auth::user()->name . ' ' . Auth::user()->surname }}</h1>
<div class="flex flex-col">
    <p>Your unique user id: <strong>{{Auth::user()->id}}</strong></p>
    <p>First Name: {{Auth::user()->name}}</p>
    <p>Surname: {{Auth::user()->surname}}</p>
    <p>Email: {{Auth::user()->email}}</p>
</div>
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
<a href="/boards/create"><button>Create</button></a> Boards:

@forelse(Auth::user()->boards as $board)
    <a style="text-decoration: none" href="/boards/{{$board->id}}">
    <div style="background: #2563eb; color:white; border: 1px solid black; padding: 2px; display: flex; flex-direction: column; width: max-content; height: auto">
        <h3>{{$board->name}}: {{$board->id}}</h3>
      <p>{{$board->type}}</p>
        @foreach($board->users as $user)
           <p style="color: red">{{$user->name}}</p>
        @endforeach
    </div>
    </a>
@empty
    <p style="color: gray">Geen borden gevonden!</p>
@endforelse
@endsection
