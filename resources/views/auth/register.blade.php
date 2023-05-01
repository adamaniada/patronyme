@extends('layouts.app')

@section('content')
<div class="row justify-content-center mb-3 mt-3">
    <div class="col-md-6">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card mb-5">
                <div class="card-body">
                    <h1 class="h3 mb-3 fw-normal">Panneau d'inscription</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    Icon
                                </span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus aria-label="name" placeholder="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    Icon
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-label="email" placeholder="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    Icon
                                </span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus aria-label="new-password" placeholder="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    Icon
                                </span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus aria-label="password_confirmation" placeholder="password_confirmation">
                            </div>
                        </div>

                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Inscription') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
