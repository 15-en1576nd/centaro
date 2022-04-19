@extends('parts.main')
@section('title', 'Dashboard')
@section('content')
<h1 class="text-3xl font-bold text-center">Welcome {{ Auth::user()->name . ' ' . Auth::user()->surname }}</h1>
<p class="mt-3 text-lg">Welcome to Centaro, centaro is a place where you can manage your transactions, saving goals and alot more!</p>
@endsection
