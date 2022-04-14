@extends('parts.board')
@section('title', 'Boards')
@section('content')
    <div class="flex p-3 rounded-md justify-center-3/4 bg-zinc-900">
        <a class="p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600" href="/dashboard/boards/{{$board->id}}/savingtargets">Back</a>
        <div class="text-3xl text-white w-full justify-center flex flex-nowrap space-x-4">
            Create your savingtarget!
        </div>
    </div>
    <form method="post" action="{{route('boards.savingtargets.store', ['board' => $board])}}">
        @csrf
        <div class="flex flex-row">
    <div class="flex p-3 rounded-md justify-center bg-zinc-900 mt-6 w-1/2 mx-7">

            <div class="flex flex-row">
            <div class="flex flex-col w-full justify-center">
                <div class="text-3xl text-white w-full flex flex-row">
                    Savingtarget information
                </div>
                <div class="flex flex-col w-2/3 justify-between">
            <label for="name" class="text-white m-2">Name</label>
            <input type="text" placeholder="Saving target name" name="name" id="name" class="p-2 rounded-md bg-zinc-700 text-white">
            <label for="amount" class="text-white m-2">Amount</label>
            <input type="number" placeholder="€0,-" name="value" id="value" class="p-2 rounded-md bg-zinc-700 text-white">
                </div>
                <div class="flex-row m-2">
                        <label for="deadline" class="text-white">Deadline</label>
                        <input type="date" name="deadline" id="deadline" class="p-2 rounded-md bg-zinc-700 text-white">
                </div>
            <label for="description" class="text-white">Description</label>
            <textarea name="description" placeholder="Describe your saving target here!" id="description" cols="30" rows="10" class="p-2 m-2 rounded-md bg-zinc-700 text-white max-h-28"></textarea>
               <input name="attachment" placeholder="https://example.be/" class="m-2 p-2 rounded-md bg-zinc-700 text-blue-600 underline">
            </div>
                <div class="ml-5 flex-col">
                <label for="icon" class="text-white flex flex-nowrap">Choose icon:</label>
                <div class="rounded-non ml-6 flex flex-row w-32 h-40 overflow-y-scroll flex-wrap">

                @foreach($icons as $icon)

                    <input type="radio" name="icon" value="{{$icon->id}}" class="p-2 rounded-md bg-zinc-700 text-white">
                    <svg class="h-9 w-9"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    {!! $icon->svg !!}
                    </svg>

                @endforeach
            </div>
                </div>

            </div>


    </div>
        <div class="flex p-3 rounded-md justify-center bg-zinc-900 mt-6 w-1/3 mx-7">
            <div class="text-3xl text-white w-full justify-start flex flex-col">
                Source base
                <div class="m-7 text-gray-400 text-base">
                        <p class="font-bold flex flex-row">
                            <input type="radio" name="source" value="manual" class="p-2 mr-2 rounded-md bg-zinc-700 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                            </svg>
                            Manual: </p>You can add the value to the savingtarget manually.<p class="text-sm text-gray-600">[Available in percentages]</p>
                        <p class="font-bold flex flex-row">
                            <input type="radio" name="source" value="auto" class="p-2 mr-2 rounded-md bg-zinc-700 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Automatic: </p>The saving target value is based on the total of the board.
                    <p class="text-sm text-gray-600">[Available in percentages]</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex mt-6 p-3 rounded-md justify-center bg-zinc-900">
        <input type="submit" value="Create" class="p-2 rounded-md bg-emerald-700 hover:bg-emerald-600">
    </div>
    </form>
                            @endsection
