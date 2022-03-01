


<form method="POST" action="{{ route('register') }}">
    @csrf
    <label for="name">{{ __('Name') }}</label>


    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    <label for="surname">{{ __('Surname') }}</label>
    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autofocus>
    <label for="email">{{ __('E-Mail Adres') }}</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    <label for="password">{{ __('Wachtwoord') }}</label>


    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    <label for="password-confirm">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">




    <button type="submit" style="margin-bottom: 4%">
        {{ __('Register') }}
    </button>



</form>


