@extends('layouts.app')

@section('content')
	@vite(['resources/scss/partials/login.scss', 'resources/js/login.js'])
	{{-- <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


	<div class="container-1" id="container">
		<div class="form-container sign-up-container">
			<form method="POST" action="{{ route('register') }}">
				@csrf

				<h1 class="mb-4">Crea un Account</h1>
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
				<input id="name" type="text" class="form-control input-style @error('name') is-invalid @enderror"
					name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
				<input id="surname" type="text" class="form-control input-style @error('surname') is-invalid @enderror"
					name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
				@error('surname')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
				<input id="email" type="email" class="form-control input-style @error('email') is-invalid @enderror"
					name="email" value="{{ old('email') }}" required autocomplete="email">
				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
				<input id="password" type="password" class="form-control input-style @error('password') is-invalid @enderror"
					name="password" required autocomplete="new-password">
				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
				<input id="password-confirm" type="password" class="form-control input-style" name="password_confirmation" required
					autocomplete="new-password">
				<label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date_of_birth') }}</label>
				<input id="date_of_birth" type="date"
					class="form-control mb-4 input-style @error('date_of_birth') is-invalid @enderror" name="date_of_birth"
					value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>
				@error('date_of_birth')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<button type="submit" class="mb-4">{{ __('Register') }}</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form method="POST" action="{{ route('login') }}">
				@csrf
				<h1 class="mb-5">Accedi</h1>
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
				<input id="email" type="email" class="form-control input-style @error('email') is-invalid @enderror"
					name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
				<input id="password" type="password" class="form-control input-style mb-5 @error('password') is-invalid @enderror"
					name="password" required autocomplete="current-password">
				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<button type="submit mt-5">{{ __('Login') }}</button>
				@if (Route::has('password.request'))
					<a class="btn btn-link" href="{{ route('password.request') }}">
						{{ __('Forgot Your Password?') }}
					</a>
				@endif
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Benvenuto!</h1>
					<p>Inserisci le tue credenziali per registrarti e accedere al tuo spazio privato</p>
					<button class="ghost" id="signIn">Login</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Bentornato!</h1>
					<p>Inserisci la tua mail e la password per accedere al tuo spazio privato</p>
					<button class="ghost" id="signUp">Register</button>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<p>
			Created by Group-5
		</p>
	</footer>
@endsection
