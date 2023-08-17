@extends('layouts.login')

@section('content')
<div class="card card-plain mt-8">
    <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-bolder text-dark text-gradient">Registrar</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name" class="col-form-label col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
            <div class="mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <div class="mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="text-center">
                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
