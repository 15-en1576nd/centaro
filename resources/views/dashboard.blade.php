@extends('parts.main')
@section('title', 'Dashboard')
@section('content')
<h1 class="text-3xl font-bold text-center">Welcome {{ Auth::user()->name . ' ' . Auth::user()->surname }}</h1>
<div class="flex justify-center">
    <div class="flex flex-col justify-center w-2/3">
        <p class="mt-3 text-lg">Welcome to Centaro, centaro is a place where you can manage your transactions, saving goals and alot more!</p>
        <h1 class="text-5xl text-emerald-600">Getting started!</h1>
        <h1 class="mt-8 text-2xl text-emerald-600">Create a board!</h1>
        <p class="mt-1 text-lg">Create a board to start managing your transactions by clicking "Economic Boards" and then click "New board!"</p>
        <h1 class="mt-8 text-2xl text-emerald-600">Create a category!</h1>
        <p class="mt-1 text-lg">Categories are used to sort out transactions, create one by clicking "Transactions" and then "Categories" and fill in the fields</p>
        <h1 class="mt-8 text-2xl text-emerald-600">Create a transaction!</h1>
        <p class="mt-1 text-lg">Create a transaction by clicking "Transactions" and then click "New transaction" and fill in all the fields</p>
        <h1 class="mt-8 text-2xl text-emerald-600">Saving goals!</h1>
        <p class="mt-1 text-lg">You can create saving goals to save for things you want to buy for example a car and it calculates everything for you. You can start creating a saving goal by clicking "Savingtargets" and click "Create".</p>

    </div>
</div>
@endsection
