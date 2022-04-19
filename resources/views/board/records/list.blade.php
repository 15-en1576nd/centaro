@extends('parts.board')
@section('title', 'Boards')
@section('content')
<div class="flex p-3 rounded-md justify-centerw-3/4 bg-zinc-900">
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
<div style="border: 0.5px black solid; padding: 2px; display: flex; flex-direction: row; font-weight: bold">
<div style="width: 100%;">Amount</div>
<div style="width: 100%;">Category</div>
<div style="width: 100%;">Title</div>
<div style="width: 50%;">Date</div>
<div style="width: 25%;">User</div>
</div>
@forelse($board->records->sortByDesc('created_at') as $record)
<div class="border-l-4 my-2 bg-zinc-900 rounded-md flex flex-row p-2 @if($record->type == "-") border-red-500 @elseif($record->type == "+") border-green-500 @endif">
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
