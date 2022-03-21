<!DOCTYPE html>
<html lang="en">
<head>
    <title>Centaro - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/extra.css') }}" rel="stylesheet">
    <!-- begin of metadata -->
    <meta property="og:title" content="Centaro">
    <meta property="og:type" content="website">
    <meta property="og:url" content="/">
    <meta property="og:description" content="Centaro is a smallsize accountancy website.">
    <meta name="theme-color" content="#05A8AA">
    <!-- end of metadata -->
</head>
<body class="font-outfit">
<section class="min-h-screen bg-zinc-800" x-data="{ sideBar: false }">
    <nav class="fixed top-0 left-0 z-20 h-full pb-10 overflow-x-hidden overflow-y-auto transition origin-left transform bg-zinc-900 w-60 md:translate-x-0" :class="{ '-translate-x-full' : !sideBar, 'translate-x-0' : sideBar }" @click.away="sideBar = false">
       <a href="/" class="flex items-center justify-center text-3xl text-center px-4 py-3 text-emerald-600"> Centaro </a>
       <nav class="text-sm font-medium text-gray-500" aria-label="Main Navigation">
          <a class="flex items-center px-4 py-2 transition cursor-pointer group hover:bg-emerald-700 hover:text-gray-200 rounded-md m-2" href="/dashboard">
           <svg class="h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
             <span class="ml-2">Home</span>
          </a>
          <a class="flex items-center px-4 py-2 transition cursor-pointer group hover:bg-emerald-700 hover:text-gray-200 rounded-md m-2" href="/dashboard/boards">
            <svg class="h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
            </svg>
            <span class="ml-2">Boards</span>
          </a>
          <a class="flex items-center px-4 py-2 transition cursor-pointer group hover:bg-emerald-700 hover:text-gray-200 rounded-md m-2" href="/account/view">
            <svg class="h-6 w-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />  <circle cx="12" cy="7" r="4" /></svg>
            <span class="ml-2">Account</span>
          </a>
          <a class="flex items-center px-4 py-2 transition cursor-pointer group hover:bg-emerald-700 hover:text-gray-200 rounded-md m-2" href="/dashboard/settings">
           <svg class="h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
             <span class="ml-2">Settings</span>
          </a>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center px-4 py-2 transition cursor-pointer group hover:bg-emerald-700 hover:text-gray-200 rounded-md m-2">
           <svg class="h-6 w-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />  <path d="M7 12h14l-3 -3m0 6l3 -3" /></svg>
             <span class="ml-2">Logout</span>
          </a>
       </nav>
    </nav>
    <div class="ml-0 transition md:ml-60">
       <header class="flex items-center justify-between w-full px-4 h-2">
          <button class="block btn btn-light-secondary md:hidden" @click.stop="sideBar = true">
             <span class="sr-only">Menu</span>
             <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
             </svg>
          </button>
       </header>
         <div class="p-4 text-white">
            @yield('content')
         </div>
    </div>
<!-- Sidebar Backdrop -->
<div class="fixed inset-0 z-10 w-screen h-screen bg-black bg-opacity-25 md:hidden" x-show.transition="sideBar" x-cloak></div>
</section>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</body>
</html>
