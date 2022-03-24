@extends('parts.board')
@section('title', 'Boards')
@section('content')
<h1 class="text-4xl">Board Categories</h1>
<div class="p-2 m-1 border-2 rounded-md border-zinc-900">
    <form class="text-gray-900" method="post">
        @csrf

        <input type="text" name="name" placeholder="Name">
        <select name="color">
            @foreach($colors as $color)
                <option value="{{$color->id}}" style="background: {{ $color->code }}; color: white">{{$color->name}}</option>
            @endforeach
        </select>
        <button class="p-2 text-white rounded-md bg-zinc-900" type="submit">Add</button>

    </form>
</div>
<br><br>
<div class="flex flex-row justify-center w-1/5">
@foreach($board->categories->sortByDesc('created_at') as $category)
    <div class="flex items-center p-2 text-center rounded-md" style="background: {{$category->color->code}};">
       {{$category->name}}
    </div>

@endforeach
</div>
@endsection
