@extends('parts.main')
@section('title', 'Dashboard')
@section('content')
<h1 class="text-3xl font-bold text-center">Welcome {{ Auth::user()->name . ' ' . Auth::user()->surname }}</h1>

<div class="p-3 m-3 rounded-md bg-zinc-900">
    <div class="flex flex-row">
        <div class="w-1/3 m-2">
            <label>First Name:</label>
            <input type="text" value="{{Auth::user()->name}}" class="block w-full px-3 py-2 text-gray-200 placeholder-gray-400 border rounded-md border-emerald-600 bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0" disabled>
        </div>
        <div class="w-1/3 m-2">
            <label>Surname:</label>
            <input type="text" value="{{Auth::user()->surname}}" class="block w-full px-3 py-2 text-gray-200 placeholder-gray-400 border rounded-md border-emerald-600 bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0" disabled>
        </div>
    </div>
    <div class="flex flex-row">
        <div class="w-1/3 m-2">
            <label>Email:</label>
            <input type="text" value="{{Auth::user()->email}}" class="block w-full px-3 py-2 text-gray-200 placeholder-gray-400 border rounded-md border-emerald-600 bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0" disabled>
        </div>
        <div class="w-1/3 m-2">
            <label>Unique user id:</label>
            <input type="text" value="{{Auth::user()->id}}" class="block w-full px-3 py-2 text-gray-200 placeholder-gray-400 border rounded-md border-emerald-600 bg-zinc-800 focus:border-emerald-400 focus:outline-none focus:ring-0" disabled>
        </div>
    </div>
</div>

@if(isset(Auth::user()->preference))
    Lang:
{{Auth::user()->preference->lang}}
    Valuta:
{{Auth::user()->preference->valuta}}
@endif
@endsection
