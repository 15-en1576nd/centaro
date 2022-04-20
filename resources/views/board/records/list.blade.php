@extends('parts.board')
@section('title', 'Boards')
@section('content')
<div class="flex flex-row p-3 rounded-md justify-between bg-zinc-900">
    <a class="p-2 transition rounded-md bg-emerald-700 hover:bg-emerald-600" href="/dashboard/boards/{{$board->id}}/categories"><button>Categories</button></a>
    <div x-data="{ modelOpen: false }">
        <button @click="modelOpen =!modelOpen" class="flex items-center justify-center p-2 px-3 mx-2 text-white transition-colors rounded-md bg-emerald-700 hover:bg-emerald-600 ">
            New Transaction
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
                        <h1 class="text-xl font-medium text-white">New Transaction</h1>

                        <button @click="modelOpen = false" class="text-gray-200 focus:outline-none hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>

                    <p class="mt-2 text-sm text-gray-200 ">
                        Create a new transaction for {{$board->name}}
                    </p>

                    <form method="post" class="mt-5">
                        @csrf
                        <div>
                            <label class="block text-sm text-gray-200">Transaction type</label>
                            <select name="type" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                                <option value="-">Minus</option>
                                <option value="+">Plus</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm text-gray-200">Category <a class="ml-3 text-gray-400" href="/dashboard/boards/{{$board->id}}/categories">Create a category</a></label>
                            <select name="category" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                                @forelse($board->categories as $category)
                                    <option value="{{$category->id}}" style="background: {{$category->color->hexcode}}">{{$category->name}}</option>
                                @empty
                                    <option value="">No categories</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm text-gray-200">Amount</label>
                            <input placeholder="1299" name="value" type="number" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm text-gray-200">Title</label>
                            <input placeholder="Payout from work" name="title" type="text" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm text-gray-200">Description</label>
                            <input placeholder="Worked 40 hours last month" name="description" type="text" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="p-2 px-3 text-white transition-colors rounded-md bg-emerald-700 hover:bg-emerald-600 focus:outline-none">
                                Add Transaction
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-row p-2 my-3 rounded-md bg-zinc-900">
<div class="w-full">Amount</div>
<div class="w-full">Category</div>
<div class="w-full">Title</div>
<div class="w-full">Date</div>
<div class="w-full">User</div>
</div>
@forelse($board->records->sortByDesc('created_at')->where('hidden', '=', false) as $record)
    <div class="border-l-4 cursor-pointer my-2 bg-zinc-900 items-center rounded-md flex flex-row justify-between p-2 @if($record->type == "-") border-red-500 @elseif($record->type == "+") border-green-500 @endif">
        <div class="w-full @if($record->type == "-")  text-red-500 @elseif($record->type == "+") text-green-500 @endif">{{$record->type . '€' . $record->value}},-</div>
        @if($record->category) <div class="w-full"><div class="font-bold w-max px-3 py-1 text-white rounded-md bg-{{$record->category->color->class}}">{{$record->category->name}}</div></div> @else <div class="flex text-gray-400">No category</div> @endif
        <div class="w-full">{{$record->title}}</div>
        <div class="w-full">{{$record->created_at->format('d/m/Y')}}</div>
        <div class="w-full">{{$record->user->name}}</div>
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
                            <h1 class="text-xl font-medium text-white">Edit Transaction  /   {{$record->title}}</h1>

                            <button @click="modelOpen = false" class="text-gray-200 focus:outline-none hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>


                        <form method="post" action="{{route('boards.records.update', ['board' => $board, 'record' => $record])}}" class="mt-5">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label class="block text-sm text-gray-200">Transaction type</label>
                                <select name="type" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                                    @if($record->type == '-')
                                        <option value="-">Minus</option>
                                        <option value="+">Plus</option>
                                        @else
                                        <option value="+">Plus</option>
                                        <option value="-">Minus</option>
                                    @endif

                                </select>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm text-gray-200">Category <a class="ml-3 text-gray-400" href="/dashboard/boards/{{$board->id}}/categories">Create a category</a></label>
                                <select name="category_id" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                                    <option value="{{$record->category->id}}">{{$record->category->name}}</option>
                                    @foreach($board->categories->except($record->category->id) as $category)
                                        <option value="{{$category->id}}" style="background: {{$category->color->hexcode}}">{{$category->name}}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm text-gray-200">Amount</label>
                                <input placeholder="1299" value="{{$record->value}}" name="value" type="number" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm text-gray-200">Title</label>
                                <input placeholder="Payout from work" name="title" value="{{$record->title}}" type="text" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm text-gray-200">Description</label>
                                <input placeholder="Worked 40 hours last month" value="{{$record->description}}" name="description" type="text" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
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
@empty
    <div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; justify-content: center; color: gray">
        <p>No transactions found.</p>
    </div>
@endforelse
@endsection
