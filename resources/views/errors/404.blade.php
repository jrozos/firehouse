@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center pt-5">
    <div class="col-12 col-md-6 col-lg-4 align-self-center">
      <h1>Opps!</h1>
      <h2>Página no econtrada</h2>
      <p>Regresar a <a href="/" class="text-info">inicio</a></p>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <img src="{{asset('img/errors/404.svg')}}" alt="" class="img-fluid">
    </div>
  </div>
</div>
@endsection
