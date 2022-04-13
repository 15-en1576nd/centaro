@extends('parts.landing')
@section('title', 'Home')
@section('content')
<div class="flex flex-row justify-center max-w-11/12">
    <div class="flex flex-row w-full p-3 m-2 text-3xl rounded-md text-emerald-600 bg-zinc-900">
        <div class="float-left w-1/4 text-center">
            <h1>Centaro</h1>
        </div>
        <div class="float-right w-3/4 text-right">
            @auth
                <a href="/dashboard" class="mx-3">Dashboard</a>
                <a class="mx-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="mx-3">Login</a>
                <a href="{{ route('register') }}" class="mx-3">Register</a>
            @endauth
        </div>
    </div>
</div>
@endsection
