@extends('layouts.app')

@section('content')
<div class="text-center" style="display: flex; align-items: center; padding-top: 40px; padding-bottom: 40px; background-color: #f5f5f5;">
    <main class="form-signin w-100 m-auto" style="max-width: 330px; padding: 15px;">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img class="mb-4" src="{{ asset('logo/bootstrap-logo.svg') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Connectez vous svp</h1>
        
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus placeholder="name@example.com">
                <label for="floatingInput">Address Mail</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="floatingPassword" name="password" value="{{ old('password') }}" autocomplete="password" autofocus placeholder="Password">
                <label for="floatingPassword">Mot de pass</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
            <div class="checkbox mb-3">
                <label><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Souvenir de moi</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
            <div>
                <div class="d-flex"><hr class="w-50">ou<hr class="w-50"></div>
                <a href="{{ route('register') }}">Inscription</a> 
                <br>
                <a href="{{ route('password.request') }}">Mot de pass oubliez?</a> 
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>
</div>
@endsection
