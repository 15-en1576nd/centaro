@extends('parts.board')
@section('title', 'Boards')
@section('content')
    <div class="flex p-3 rounded-md justify-between bg-zinc-900 w-full text-center">
        <a class="flex p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600"
           href="/dashboard/boards/{{$board->id}}/savingtargets">Back</a>
        <div class="text-3xl text-white w-full justify-center flex flex-nowrap space-x-4">
            Savingtargets</div>
        <a class="flex p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600"
           href="/dashboard/boards/{{$board->id}}/savingtargets/create">Create</a>
        </div>
    </div>
{{--    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row">--}}
{{--        <form method="post">--}}
{{--            @csrf--}}
{{--            <input class="text-gray-900 placeholder-gray-600" type="number" step="0.1" name="value"--}}
{{--                   placeholder="Amount. 10">--}}
{{--            <input class="text-gray-900 placeholder-gray-600" type="text" name="title" placeholder="Title">--}}
{{--            <input class="text-gray-900 placeholder-gray-600" type="text" name="description" placeholder="Description">--}}
{{--            <input class="text-gray-900 placeholder-gray-600" type="date" name="deadline">--}}
{{--            <select class="text-gray-900 placeholder-gray-600" name="color">--}}
{{--                @foreach($colors as $color)--}}
{{--                    <option value="{{$color->id}}" style="background: {{$color->code}}">{{$color->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <input type="submit" value="add">--}}

{{--        </form>--}}
{{--    </div>--}}
    <br><br>
    <div class="flex flex-wrap flex-row justify-center">
        @forelse($board->savingtargets as $savingtarget)
            <div
                class="w-1/4 flex-wrap m-3 p-4 text-white bg-zinc-900 border-l-4 border-{{$savingtarget->color->class}} rounded-lg">
                <div class="flex items-center">
                    <div class="icon w-14 p-3.5 bg-{{$savingtarget->color->class}} text-white rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center w-full">
                        <div class="text-lg hover:underline cursor-pointer">
                            <a href="{{ route('boards.savingtargets.show', ['board' => $board, 'boardsavingtarget' => $savingtarget->id])}}">{{$savingtarget->name}}</a>
                        </div>
                        <div class="text-sm text-emerald-500">Goal: €{{$savingtarget->value}}</div>
                        <div class="text-sm text-red-500">To go: @if($savingtarget->value > $total)
                                €{{$savingtarget->value - $total}}
                            @else
                                €0

                            @endif </div>

                        <div
                            class="text-sm text-gray-500">@if((new DateTime()) < (new DateTime($savingtarget->deadline)))
                                Finishes
                                over: {{$daycount = (new DateTime())->diff(new DateTime($savingtarget->deadline))->days}} @if($daycount > 1 )
                                    days @else day @endif
                            @elseif((new DateTime())->diff(new DateTime($savingtarget->deadline))->days = 0 )
                                Passed today!
                            @else


                                Passed {{$daycount = (new DateTime())->diff(new DateTime($savingtarget->deadline))->days}} @if($daycount > 1 )
                                    days @else day @endif ago!
                            @endif
                        </div>
                        <div class="relative flex bottom w-full bg-gray-900 rounded-full dark:bg-gray-200">
                            <div
                                style="width: @if($total < $savingtarget->value){{$progress = floor($total / $savingtarget->value * 100)}}@else{{$progress = 100}}@endif%"
                                class="absolute bg-blue-600 text-xs font-medium text-blue-100 text-center p-3 leading-none rounded-full"
                            >
                            </div>
                            <div class="z-10 relative w-full outline-none text-center">{{$progress}}%</div>
                        </div>
                    </div>

                </div>

            </div>
        @empty
            <div
                style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; justify-content: center; color: gray">
                <p>No savingtargets found!</p>

            </div>
        @endforelse
    </div>
@endsection
