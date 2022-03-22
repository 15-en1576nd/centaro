@extends('parts.main')
@section('title', 'Boards')
@section('content')
<div class="flex flex-row w-full flex-wrap justify-center">
    @forelse(Auth::user()->boards as $board)
            <div class="flex flex-col m-3 p-2 w-1/4 text-center bg-zinc-900  rounded-md">
                <a href="/dashboard/boards/{{$board->id}}" class="text-3xl break-words">{{$board->name}}: {{$board->id}}</a>

                <p class="capitalize">{{$board->type}}</p>
                <div class="flex flex-row justify-around flex-wrap">
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
