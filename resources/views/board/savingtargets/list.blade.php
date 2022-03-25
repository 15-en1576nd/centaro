@extends('parts.board')
@section('title', 'Boards')
@section('content')

<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">
    <form method="post">

        @csrf


        <input class="text-gray-900 placeholder-gray-600" type="number" step="0.1" name="value" placeholder="Amount. 10">
        <input class="text-gray-900 placeholder-gray-600" type="text" name="title" placeholder="Title">
        <input class="text-gray-900 placeholder-gray-600" type="text" name="description" placeholder="Description">
        <input class="text-gray-900 placeholder-gray-600" type="date" name="deadline">
        <select class="text-gray-900 placeholder-gray-600" name="color">
            @foreach($colors as $color)
                <option value="{{$color->id}}" style="background: {{$color->code}}">{{$color->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="add">

    </form>
</div>
<br><br>
<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; font-weight: bold">
    <div style="width: 100%;">Goal:</div>
    <div style="width: 100%;">Description:</div>
    <div style="width: 100%;">Progress:</div>
    <div style="width: 100%;">Status:</div>
    <div style="width: 100%;">User:</div>
</div>
<div class="flex flex-wrap flex-row justify-center">
@forelse($board->savingtargets as $savingtarget)
        <div class="w-1/4 flex-wrap m-3 p-4 text-gray-900 bg-white border-l-4 border-green-400 rounded-lg">
            <div class="flex items-center">
                <div class="icon w-14 p-3.5 bg-green-400 text-white rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <div class="flex flex-col justify-center">
                    <div class="text-lg">{{$savingtarget->name}}</div>
                    <div class="text-sm text-emerald-500">Doel: €{{$savingtarget->value}}</div>
                    <div class="text-sm text-red-500">Te gaan: €{{$savingtarget->value - $total}}</div>
                    <div class="text-sm text-gray-500">Loopt af over: {{ (new DateTime(now()->format("y-m-d")))->diff(new DateTime($savingtarget->deadline))->days}} dagen</div>
                </div>

            </div>

        </div>


{{--    <div style="background: {{$savingtarget->color->code}}; color: white; border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">--}}

{{--        <div style="width: 100%; font-weight: bold; ">{{'€' . $savingtarget->value}},-</div>--}}
{{--        <div style="width: 100%;">{{$savingtarget->name}}</div>--}}
{{--        <div style="width: 100%;">{{floor($total / $savingtarget->value * 100)}}%</div>--}}
{{--        <div style="width: 100%; flex-wrap: wrap; font-weight: lighter">{{$savingtarget->status}}</div>--}}
{{--        <div style="width: 100%; flex-wrap: wrap; font-weight: lighter">{{$savingtarget->deadline}}</div>--}}
{{--    </div>--}}
@empty
    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; justify-content: center; color: gray">
        <p>Geen spaardoelen gevonden.</p>
    </div>
@endforelse
</div>
    @endsection
