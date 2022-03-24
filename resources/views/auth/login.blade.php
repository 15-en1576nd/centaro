@extends('parts.auth')
@section('title', 'Login')
@section('content')
<div class="flex items-center justify-center w-full h-screen bg-gradient-to-br from-emerald-600 to-teal-600">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex flex-col justify-center max-w-sm p-2 px-10 py-8 m-auto text-black bg-zinc-100 rounded-xl">
                <h1 class="mb-4 text-3xl text-center">{{ __('Login') }}</h1>
                <label for="email">{{ __('Email Adress') }}</label>
                <input class="border-2 rounded-md border-red focus:border-emerald-600 focus:ring-0 focus:ring-offset-0" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label for="password">{{ __('Password') }}</label>
                <input class="border-2 rounded-md border-red focus:border-emerald-600 focus:ring-0 focus:ring-offset-0" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <div class="flex flex-row items-center">
                    <label for="remember" style="display: flex; width: max-content">{{ __('Remember me') }} </label>
                    <input class="float-left w-4 h-4 mt-1 ml-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border-gray-300 rounded-sm appearance-none cursor-pointer checked:bg-emerald-600 checked:border-emerald-600 checked:hover:bg-emerald-600 focus:outline-emerald-600 focus:text-emerald-600" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                </div>
                <button class="p-2 my-2 transition rounded-md bg-emerald-600 hover:bg-emerald-500" type="submit">{{ __('Login') }}</button>
                <div class="flex flex-row">
                    <p>Don't have an account? <a class="font-semibold hover:underline text-emerald-700" href="/register">{{ __('Register') }}</a></p>
                </div>
            </div>
        </form>
    </div>
