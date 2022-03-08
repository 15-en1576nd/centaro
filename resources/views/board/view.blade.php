<h1>{{$board->name}}</h1>
<h2>Uitgerekend saldo:</h2>
<h2 style="color: #2563eb">€{{$total}},- <button alt="Het kan gebeuren dat je saldo niet meer up-to-date is. Daarvoor is deze knop.">Corrigeer</button></h2>
<h2>Maandelijkse Uitgaven:</h2>
<h2 style="color: indianred">€{{$totalspendings}},-</h2>
<h2>Maandelijkse Inkomsten:</h2>
<h2 style="color: green">€{{$totalincome}},-</h2>
<a href="/boards/{{$board->id}}/records"><button>Manage economics</button></a>
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

<form method="post" action="{{route('boards.destroy', $board->id) }}">
    @method('DELETE')
    @csrf
<input type="submit" value="Destroy">
</form>


