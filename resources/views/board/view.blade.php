@extends('parts.board')
@section('title', 'Board - ' . $board->name)
@section('content')
<div class="flex flex-col justify-center w-3/5 m-auto">

    <h1 class="text-4xl">Board: {{$board->name}}</h1>
    <p>Type: {{$board->type}}</p>
    <h1 class="text-2xl">Statistics</h1>
    <div class="flex flex-row justify-center w-full">
        <div class="w-full m-1">
            <div class="w-full p-4 text-gray-900 bg-white border-l-4 border-green-400 rounded-lg">
                <div class="flex items-center">
                    <div class="icon w-14 p-3.5 bg-green-400 text-white rounded-full mr-3">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center">
                        <div class="text-lg">€{{$total}}</div>
                        <div class="text-sm text-gray-400">Total Balance</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full m-1">
            <div class="w-full p-4 text-gray-900 bg-white border-l-4 border-blue-400 rounded-lg">
                <div class="flex items-center">
                    <div class="icon w-14 p-3.5 bg-blue-400 text-white rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center">
                        <div class="text-lg">€{{$totalincome}}</div>
                        <div class="text-sm text-gray-400">Total Income</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full m-1">
            <div class="w-full p-4 text-gray-900 bg-white border-l-4 border-red-400 rounded-lg">
                <div class="flex items-center">
                    <div class="icon w-14 p-3.5 bg-red-400 text-white rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center">
                        <div class="text-lg">€{{$totalspendings}}</div>
                        <div class="text-sm text-gray-400">Total Expenses</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{route('boards.destroy', $board->id) }}">
        @method('DELETE')
        @csrf
    <button class="p-2 transition bg-red-600 rounded-md hover:bg-red-500" type="submit">Delete Board</button>
    </form>
</div>
@endsection

