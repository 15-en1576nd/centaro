@extends('parts.board')
@section('title', 'Board - ' . $board->name)
@section('content')
<div class="flex p-3 rounded-md justify-centerw-3/4 bg-zinc-900">
<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" class="flex items-center justify-center p-2 px-3 mx-2 text-white transition-colors rounded-md bg-emerald-700 hover:bg-emerald-600 ">
        Add User
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
                    <h1 class="text-xl font-medium text-white">Add User</h1>

                    <button @click="modelOpen = false" class="text-gray-200 focus:outline-none hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <p class="mt-2 text-sm text-gray-200 ">
                    Give a user access to <strong>{{$board->name}}</strong>
                </p>

                <form action="/dashboard/boards/{{$board->id}}/users" method="post" class="mt-5">
                    @csrf

                    <div class="mt-4">
                        <label class="block text-sm text-gray-200">User Email</label>
                        <input  type="email" name="email" placeholder="mike@centaro.nl" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-gray-200">Role</label>
                        <select name="category" class="block w-full px-3 py-2 mt-2 text-gray-200 placeholder-gray-400 border border-gray-200 rounded-md bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0">
                            @forelse($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @empty
                                <option value="">No roles</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="p-2 px-3 text-white transition-colors rounded-md bg-emerald-700 hover:bg-emerald-600 focus:outline-none">
                            Add User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<div class="flex flex-row flex-wrap">
@foreach($board->users as $user)
    <div class="flex flex-row items-center p-3 m-2 border-l-4 rounded-md border-emerald-600 bg-zinc-900">
        <div class="flex flex-col">
            <h1>{{$user->name}} {{$user->surname}}</h1>
            <h1 class="text-gray-500">{{$user->email}}</h1>
        </div>
        <div>
            <form method="post" action="/dashboard/boards/{{$board->id}}/users/{{$user->id}}">
                <p>
                    @method('DELETE')
                    @csrf
                    <button class="p-2 ml-2 text-gray-300 hover:text-gray-600" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </p>
            </form>
        </div>
    </div>
@endforeach
</div>
@endsection
