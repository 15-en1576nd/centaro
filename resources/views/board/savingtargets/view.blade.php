@extends('parts.board')
@section('title', 'Boards')
@section('content')
    <div class="flex p-3 rounded-md justify-between bg-zinc-900 w-full text-center">
        <a class="flex p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600"
           href="/dashboard/boards/{{$board->id}}/savingtargets">Back</a>

        <div class="text-3xl text-white w-full justify-center flex flex-nowrap space-x-4">
            Savingtarget
            <div class="w-1/4 text-emerald-700"> {{$savingtarget->name}}</div>
        </div>
        <a class="flex p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600"
           href="/dashboard/boards/{{$board->id}}/savingtargets/edit">Edit</a>
    </div>
    <div class="flex p-3 rounded-md justify-around bg-zinc-900 w-full text-center mt-10">
        <div class="w-2/5 rounded-md p-3 bg-zinc-700 border-l-4 border-emerald-700">
            <div class="text-3xl text-white w-full justify-center">
                Savingtarget information
            </div>
            <div class="pt-4 px-7 w-full justify-start flex-col">
                <div class="flex text-left  text-2xl">Description</div>
                <div class="flex text-gray-400">@isset($savingtarget->description) {{$savingtarget->description}} @else
                        No discription @endisset</div>
                <div class="flex text-2xl flex-row">Goal value @if($savingtarget->type == 'auto')
                        <div class="flex text-sm text-gray-400 items-center ml-5">(based
                            on {{$savingtarget->type_attributes['percentage']}}%)
                        </div>@endif</div>
                <div class="flex text-green-400 ">@isset($savingtarget->value) €{{$savingtarget->value}} @else No goal
                    value @endisset</div>
                <div class="flex text-2xl">URL</div>
                <div class="flex text-gray-400">@isset($savingtarget->attachment)
                        <a class="text-blue-600 underline flex flex-row items-center"
                           href="{{$savingtarget->attachment}}"><img class="w-5 h-5 bottom-0 mr-2"
                                                                     src="{{$savingtarget->attachment}}/favicon.ico">{{substr($savingtarget->attachment,0,30).'  .  .  .'}}
                        </a> @else No URL. @endisset</div>
                <div class="flex text-gray-500"> Created at: {{$savingtarget->created_at->format('d/m/Y H:i')}}
                    ({{$savingtarget->created_at->diffInDays(now())}} days ago)
                </div>
                @if($board->type == 'team')
                    <div class="flex text-gray-500"> by: {{$savingtarget->user->name}} </div>
                @endif
            </div>
        </div>
        <div class="w-2/5 rounded-md justify-center p-3 bg-zinc-700 border-l-4 border-emerald-700">
            <div class="text-3xl text-white w-full justify-center">
                Savingtarget progress
            </div>
            <div class="pt-4 px-7 w-full justify-start flex-col">

                <div class="flex text-2xl">Savingtarget togo</div>
                <div class="flex text-green-400 ">@isset($savingtarget->value)
                        €{{$savingtarget->value - $savingtarget->total}}
                        ({{100 - floor($savingtarget->total / $savingtarget->value *100)}}%) @else No goal
                        value @endisset</div>

                <div class="flex text-2xl">Target date</div>
                <div class="flex text-gray-400">@isset($savingtarget->deadline) {{$savingtarget->deadline}}
                    ({{$savingtarget->countdown}} days to-go) @else No target date @endisset</div>
                <div class="flex flex-row justify-between mr-4">
                    <div>
                        <div class="flex text-2xl">Per week:</div>
                        <div class="flex text-gray-400">@isset($savingtarget->deadline)
                                €{{floor($savingtarget->value / ($savingtarget->interval / 7))}} @else No deadline set
                                (cant calculate) @endisset</div>
                    </div>
                    <div>
                        <div class="flex text-2xl">Per month:</div>
                        <div class="flex text-gray-400">@isset($savingtarget->deadline)
                                €{{floor($savingtarget->value / ($savingtarget->interval / 30))}} @else No deadline set
                                (cant calculate) @endisset</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="flex p-3 rounded-md justify-center-3/4 bg-zinc-900 w-full text-center mt-5">
        <div class="relative flex bottom h-10 w-full bg-gray-400 rounded dark:bg-gray-700">
            <div
                style="width: @if($savingtarget->total < $savingtarget->value){{$progress = floor($savingtarget->total / $savingtarget->value * 100)}}@else{{$progress = 100}}@endif%"
                class="absolute bg-emerald-700 text-xs font-large text-blue-100 flex p-5 px-0 leading-none rounded">
            </div>
            <div class="z-10 relative w-full h-full flex justify-center text-2xl text-center">{{$progress}}%</div>
        </div>
    </div>
    @if($savingtarget->type == 'manual')

        <div class="flex p-3 rounded-md justify-center bg-zinc-900 mt-6 w-full">
            <div class="flex flex-col">
                <div class="flex flex-row h-min justify-center">
                    <div class="w-full space-x-4">
                        <form class="flex flex-row justify-center items-center space-x-4" method="post" action="{{route('boards.records.store', ['board' => $board])}}">
                            @csrf
                            <div class="text-2xl text-white w-full flex">Manual adding:</div>
                            <input type="number" name="value" placeholder="100€" class="m-2 p-2 rounded-md bg-zinc-700">
                            <input type="hidden" name="savingtarget" value="{{$savingtarget->id}}">
                            <div class="flex items-center flex-row text-sm text-gray-400">Automatically add transaction amount to board transactions. <input
                                    type="checkbox" value="false" name="hidden"></div>
                            <button type="submit" name="type" value="+" class="h-min bg-green-500 text-white p-2 rounded-md">Add</button>
                            <button type="submit" name="type" value="-" class="h-min bg-red-500 text-white p-2 rounded-md">Remove</button>
                        </form>
                <div class="flex flex-row flex-nowrap w-full justify-between">
                    <div class="flex p-1 rounded-md flex-col bg-zinc-700 mt-2 w-2/5 h-60 overflow-y-scroll">
                        <div class="text-2xl justify-center text-white w-full flex">Increases</div>
                        <div class="text-gray-400 flex justify-between px-4">
                            <div>Total transactions: {{count($savingtarget->records->where('type', '=', '+'))}}</div>
                            <div>Total value: €{{$savingtarget->records->where('type', '=', '+')->sum('value')}}</div>
                        </div>
                        @foreach($savingtarget->records->where('type', '=', '+')->sortByDesc('created_at') as $record)
                            <div class="flex flex-row justify-between w-full p-2 border-b-2 border-gray-500">
                                <div class="text-green-400 flex">€+{{$record->value}}</div>
                                <div class="text-gray-400 flex">{{$record->created_at->format('d/m/Y')}}</div>
                                <a class="cursor-pointer" data-modal-toggle="popup-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-red-600"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </a>
                                <div id="popup-modal" tabindex="-1"
                                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex justify-end p-2">
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-toggle="popup-modal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 pt-0 text-center">
                                                <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200"
                                                     fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Do
                                                    you want to delete this record?</h3>
                                                <div class="justify-center flex flex-row">
                                                    <form method="post"
                                                          action="{{ route('boards.records.destroy', ['board' => $board, 'record' => $record]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-modal-toggle="popup-modal"
                                                                type="button"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                            Yes, I'm sure
                                                        </button>
                                                    </form>
                                                    <button data-modal-toggle="popup-modal" type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        No, cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                    <div class="flex p-1 rounded-md flex-col bg-zinc-700 mt-2 w-2/5 h-60 overflow-y-scroll">
                        <div class="text-2xl justify-center text-white w-full flex">Decreases</div>
                        <div class="text-gray-400 flex justify-between px-4">
                            <div>Total transactions: {{count($savingtarget->records->where('type', '=', '-'))}}</div>
                            <div>Total value: €-{{$savingtarget->records->where('type', '=', '-')->sum('value')}}</div>
                        </div>
                        @foreach($savingtarget->records->where('type', '=', '-')->sortByDesc('created_at') as $record)
                            <div class="flex flex-row justify-between w-full p-2 border-b-2 border-gray-500">
                                <div class="text-red-400 flex">€-{{$record->value}}</div>
                                <div class="text-gray-400 flex">{{$record->created_at->format('d/m/Y')}}</div>
                                <a class="cursor-pointer" data-modal-toggle="popup-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:text-red-600"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </a>
                                <div id="popup-modal" tabindex="-1"
                                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex justify-end p-2">
                                                <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-toggle="popup-modal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 pt-0 text-center">
                                                <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200"
                                                     fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Do
                                                    you want to delete this record?</h3>
                                                <div class="justify-center flex flex-row">
                                                    <form method="post"
                                                          action="{{ route('boards.records.destroy', ['board' => $board, 'record' => $record]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-modal-toggle="popup-modal"
                                                                type="button"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                            Yes, I'm sure
                                                        </button>
                                                    </form>
                                                    <button data-modal-toggle="popup-modal" type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        No, cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                </div>
                </div>
        </div>
    @endif
@endsection
