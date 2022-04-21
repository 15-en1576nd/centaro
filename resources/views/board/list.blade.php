@extends('parts.main')
@section('title', 'Boards')
@section('content')
<div class="flex p-3 rounded-md justify-center-3/4 bg-zinc-900">
    <div x-data="{ modelOpen: false }">
        <button @click="modelOpen =!modelOpen" class="flex items-center justify-center p-2 px-3 mx-2 text-white transition-colors rounded-md bg-emerald-700 hover:bg-emerald-600 ">
            New board!
        </button>
        <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                ></div>

                <div x-cloak x-show="modelOpen"
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200 transform"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform rounded-lg shadow-xl bg-zinc-900 2xl:max-w-2xl"
                >
                    <div class="flex items-center justify-between space-x-4">
                        <h1 class="text-xl font-medium text-white">New Board</h1>

                        <button @click="modelOpen = false" class="text-gray-200 focus:outline-none hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>

                    <p class="mt-2 text-sm text-gray-200 ">
                        Create a new board!
                    </p>

                    <form method="post" class="mt-5">
                        @csrf
                        <div class="text-2xl text-white w-full justify-start flex flex-col">
                            Type:
                            <div class="m-7 text-gray-400 text-base">
                                <p class="font-bold flex flex-row">
                                    <input type="radio" value="personal" name="type" class="p-2 mr-2 rounded-md bg-zinc-700 text-white" checked>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Personal: </p>Only you can acces the board. This is mainly intended for private businesses and the self-employed.<p class="text-sm text-gray-600">[Can be toggled to team modus]</p>
                                <p class="font-bold flex flex-row">
                                    <input type="radio" value="team" name="type" class="p-2 mr-2 rounded-md bg-zinc-700 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>      </svg>
                                    Team: </p>You can add members to a team board. This can be useful, for example, for roommates but also for small companies.
                                <p class="text-sm text-gray-600">[Can be toggled to team modus]</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-200">Name</label>
                            <input placeholder="Give your board a name!" value="{{Auth::user()->name}}'s board" name="name" type="text" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="p-2 px-3 text-white transition-colors rounded-md bg-emerald-700 hover:bg-emerald-600 focus:outline-none">
                                Create
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="flex flex-row flex-wrap justify-center w-full">
    @forelse(Auth::user()->boards as $board)
            <div class="flex flex-col border-2 border-zinc-900 w-1/4 m-3 text-center rounded-md bg-zinc-900">
                <div class="w-full px-4 py-1 flex flex-row rounded-md justify-around items-center bg-zinc-700">
                @if($board->type == 'team')
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class=" inline-block w-6 h-6 mb-3 text-emerald-600" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                    </svg>
                    @elseif($board->type == 'personal')
                    <svg xmlns="http://www.w3.org/2000/svg" class=" inline-block w-6 h-6 mb-3 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                @endif
                <a href="/dashboard/boards/{{$board->id}}" class="text-2xl break-words">{{$board->name}}</a>
                    <a class="cursor-pointer" data-modal-toggle="popup-modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 hover:text-red-600"
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
                                        you want to delete this board?</h3>
                                    <div class="justify-center flex flex-row">
                                        <form method="post"
                                              action="{{ route('boards.destroy', ['board' => $board]) }}">
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
                    <div x-data="{ modelOpen: false }">
                        <a @click="modelOpen =!modelOpen">  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 dark:hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg></a>
                        <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                     x-transition:enter="transition ease-out duration-300 transform"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     x-transition:leave="transition ease-in duration-200 transform"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                                ></div>

                                <div x-cloak x-show="modelOpen"
                                     x-transition:enter="transition ease-out duration-300 transform"
                                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave="transition ease-in duration-200 transform"
                                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform rounded-lg shadow-xl bg-zinc-900 2xl:max-w-2xl"
                                >
                                    <div class="flex items-center justify-between space-x-4">
                                        <h1 class="text-xl font-medium text-white">Edit Board</h1>

                                        <button @click="modelOpen = false" class="text-gray-200 focus:outline-none hover:text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <p class="mt-2 text-sm text-gray-200 ">
                                        Edit board / {{$board->name }}
                                    </p>

                                    <form action="{{route('boards.update', ['board' => $board])}}" method="post" class="mt-5">
                                        @csrf
                                        @method('PATCH')
                                        <div class="text-2xl text-white w-full justify-start flex flex-col">
                                            Type:
                                            <div class="m-7 text-gray-400 text-base">
                                                <p class="font-bold flex flex-row">
                                                    <input type="radio" value="personal" name="type" class="p-2 mr-2 rounded-md bg-zinc-700 text-white" @if($board->type == 'personal') checked @endif>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                    </svg>
                                                    Personal: </p>Only you can acces the board. This is mainly intended for private businesses and the self-employed.<p class="text-sm text-gray-600">[Can be toggled to team modus]</p>
                                                <p class="font-bold flex flex-row">
                                                    <input type="radio" value="team" name="type" class="p-2 mr-2 rounded-md bg-zinc-700 text-white" @if($board->type == 'team') checked @endif>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                                        <circle cx="9" cy="7" r="4"></circle>
                                                        <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>      </svg>
                                                    Team: </p>You can add members to a team board. This can be useful, for example, for roommates but also for small companies.
                                                <p class="text-sm text-gray-600">[Can be toggled to team modus]</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <label class="block text-gray-200">Name</label>
                                            <input placeholder="Give your board a name!" value="{{$board->name}}" name="name" type="text" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                                        </div>

                                        <div class="flex justify-end mt-6">
                                            <button type="submit" class="p-2 px-3 text-white transition-colors rounded-md bg-emerald-700 hover:bg-emerald-600 focus:outline-none">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="capitalize">{{$board->type}}-board</p>

                <div class="flex flex-row flex-wrap justify-center space-x-6 px-12 py-2.5">
                    @if($board->type == 'team')
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="inline-block w-8 h-8 mb-3 text-emerald-600" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                    </svg>
                    <div class="text-white text-2xl">{{count($board->users)}}</div>
                    @endif
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="inline-block w-8 h-8 mb-3 text-emerald-600" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="text-white text-2xl">{{count($board->records)}}</div>
                </div>

</div>
    @empty
        <p class="text-3xl">No Boards Found! <a href="/dashboard/boards/create" class="text-emerald-600">Create One!</a></p>
    @endforelse
</div>
@endsection
