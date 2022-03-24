@extends('parts.board')
@section('title', 'Boards')
@section('content')
<div class="flex p-3 rounded-md justify-centerw-3/4 bg-zinc-900">
    <a class="p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600" href="/dashboard/boards/{{$board->id}}/category"><button>Categories</button></a>
</div>
<div class="flex flex-row justify-center p-2 mt-3 rounded-md bg-zinc-900">
    <form method="post">
        @csrf
        <select class="text-black" name="type">
            <option value="-">-</option>
            <option value="+">+</option>
        </select>
        <select class="text-black" name="category">
            @foreach($board->categories as $category)
                <option value="{{$category->id}}" style="background: {{$category->color->hexcode}}">{{$category->name}}</option>
            @endforeach
            <option onclick="location.href=('/boards/{{$board->id}}/category')">Create</option>
        </select>
        <input class="text-gray-900 placeholder-gray-600" type="number" step="0.1" name="value" placeholder="Amount. 10">
        <input class="text-gray-900 placeholder-gray-600" type="text" name="title" placeholder="Title">
        <input class="text-gray-900 placeholder-gray-600" type="text" name="description" placeholder="Description">
        <input class="text-white placeholder-gray-600" type="file" placeholder="pdf, docx, png, jpeg" name="attachment">
        <button class="text-white" type="submit">Add</button>

    </form>
</div>
<br><br>
<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; font-weight: bold">
<div style="width: 100%;">Amount</div>
<div style="width: 100%;">Category</div>
<div style="width: 100%;">Title</div>
<div style="width: 50%;">Date</div>
<div style="width: 25%;">User</div>
</div>
@forelse($board->records->sortByDesc('created_at') as $record)
    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">

        <div style="width: 100%; font-weight: bold;" class="@if($record->type == "-") text-red-500 @elseif($record->type == "+") text-green-500 @endif">{{$record->type . '€' . $record->value}},-</div>
        <div style="width: 100%; color: {{$record->category->color->code}}">{{$record->category->name}}</div>
        <div style="width: 100%; flex-wrap: wrap; font-weight: lighter">{{$record->title}}</div>
        <div style="width: 50%">{{$record->created_at->format('d/m/Y')}}</div>
        <div style="width: 25%">{{$record->user->name}}</div>
    </div>
@empty
    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; justify-content: center; color: gray">
        <p>No transactions found.</p>
    </div>
@endforelse
@endsection
