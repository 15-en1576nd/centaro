@extends('parts.board')
@section('title', 'Board - ' . $board->name)
@section('content')
<form action="/dashboard/boards/{{$board->id}}/users" method="post">

    @csrf
    <input class="text-gray-800 font-bold" type="email" name="email" placeholder="email of user">
    <button class="p-3 bg-gray-900 rounded-md" type="submit">Add</button>
</form>
@foreach($board->users as $user)

<div class="flex flex-row items-center m-2">
    {{$user->name}}
    {{$user->surname}}
    <form method="post" action="/dashboard/boards/{{$board->id}}/users/{{$user->id}}">
        <p>
        @method('DELETE')
        @csrf
        <button class="p-2 ml-2 bg-gray-900 rounded-md" type="submit">X</button>
        </p>
    </form>
</div>

@endforeach
@endsection
