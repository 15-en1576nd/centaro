


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email">{{ __('E-Mail Adres') }}</label>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                <label for="password">{{ __('Wachtwoord') }}</label>


                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">





                    <label for="remember" style="display: flex; width: max-content">{{ __('Onthoud mij') }} </label>
                    <br><input style="display: flex" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>




                <button type="submit">
                    {{ __('Login') }}
                </button>



            </form>


