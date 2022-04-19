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
<div class="flex justify-center py-64 text-emerald-600">
    <div class="w-7/12">
        <h1 class="text-6xl">Centaro</h1>
        <h1 class="text-4xl">Manage your wallet on the way!</h1>
    </div>
</div>
<div class="flex flex-wrap justify-center m-auto text-center">
    <div class="w-full p-4 md:w-1/4 sm:w-1/2">
      <div class="px-4 py-6 border-2 rounded-lg border-emerald-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-12 h-12 mb-3 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
        </svg>
        <h2 class="text-3xl font-medium text-gray-100 title-font">{{$boards}}</h2>
        <p class="leading-relaxed text-gray-400">Boards</p>
      </div>
    </div>
    <div class="w-full p-4 md:w-1/4 sm:w-1/2">
      <div class="px-4 py-6 border-2 rounded-lg border-emerald-600">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="inline-block w-12 h-12 mb-3 text-emerald-600" viewBox="0 0 24 24">
          <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
          <circle cx="9" cy="7" r="4"></circle>
          <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
        </svg>
        <h2 class="text-3xl font-medium text-gray-100 title-font">{{$users}}</h2>
        <p class="leading-relaxed text-gray-400">Users</p>
      </div>
    </div>
    <div class="w-full p-4 md:w-1/4 sm:w-1/2">
      <div class="px-4 py-6 border-2 rounded-lg border-emerald-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-12 h-12 mb-3 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h2 class="text-3xl font-medium text-gray-100 title-font">{{$records}}</h2>
        <p class="leading-relaxed text-gray-400">Transactions Recorded</p>
      </div>
    </div>
  </div>
@endsection
