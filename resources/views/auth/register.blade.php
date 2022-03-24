@extends('parts.auth')
@section('title', 'Register')
@section('content')
<div class="flex items-center justify-center w-full h-screen bg-gradient-to-br from-emerald-600 to-teal-600">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex flex-col justify-center max-w-sm p-2 px-10 py-8 m-auto text-black bg-zinc-100 rounded-xl">
            <label for="name">{{ __('Name') }}</label>


            <input class="border-2 rounded-md border-red focus:border-emerald-600 focus:ring-0 focus:ring-offset-0" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <label for="surname">{{ __('Surname') }}</label>
            <input class="border-2 rounded-md border-red focus:border-emerald-600 focus:ring-0 focus:ring-offset-0" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autofocus>
            <label for="email">{{ __('E-Mail Adres') }}</label>
            <input class="border-2 rounded-md border-red focus:border-emerald-600 focus:ring-0 focus:ring-offset-0" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            <label for="password">{{ __('Wachtwoord') }}</label>
            <input class="border-2 rounded-md border-red focus:border-emerald-600 focus:ring-0 focus:ring-offset-0" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input class="border-2 rounded-md border-red focus:border-emerald-600 focus:ring-0 focus:ring-offset-0" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <button class="p-2 my-2 transition rounded-md bg-emerald-600 hover:bg-emerald-500" type="submit">{{ __('Register') }}</button>
            <div class="flex flex-row">
                <p>Already have an account? <a class="font-semibold hover:underline text-emerald-700" href="/login">{{ __('Login') }}</a></p>
            </div>
        </div>



    </form>
</div>
@endsection
