@extends('layouts.login')

@section('content')  
<div class="card card-plain mt-8">
  <div class="card-header pb-0 text-left bg-transparent">
    <h3 class="font-weight-bolder text-dark text-gradient">A rayar de nuevo</h3>
    <p class="mb-0">Ya te la sabes correo y contra</p>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
    @csrf
      <label class="col-form-label text-md-right">E-mail</label>
      <div class="mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <label class="col-form-label text-md-right">Contraseña</label>
      <div class="mb-3">
        <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label " for="remember">Remember me</label>
      </div>
      <div class="text-center">
        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Entrar</button>
      </div>
    </form>
  </div>
</div>
@endsection

  