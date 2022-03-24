@extends('parts.main')
@section('title', 'Boards')
@section('content')
<div class="flex p-3 rounded-md justify-centerw-3/4 bg-zinc-900">
    <a class="p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600" href="/dashboard/boards/create">Create Board</a>
</div>
<div class="flex flex-row flex-wrap justify-center w-full">
    @forelse(Auth::user()->boards as $board)
            <div class="flex flex-col w-1/4 p-2 m-3 text-center rounded-md bg-zinc-900">
                <a href="/dashboard/boards/{{$board->id}}" class="text-3xl break-words">{{$board->name}}: {{$board->id}}</a>

                <p class="capitalize">{{$board->type}}</p>
                <div class="flex flex-row flex-wrap justify-around">
                    @foreach($board->users as $user)
                        <p style="color: red">{{$user->name}}</p>
                    @endforeach
                </div>
            </div>
    @empty
        <p class="text-3xl">No Boards Found! <a href="/dashboard/boards/create" class="text-emerald-600">Create One!</a></p>
    @endforelse
</div>
@endsection
