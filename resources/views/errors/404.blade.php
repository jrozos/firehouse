@extends('layouts.app')

@section('content')
<div class="row my-5 mx-0 justify-content-center">
  <div class="col-lg-10 col-md-8 mb-md-0 mb-4">
    <div class="card">
      <div class="card-header p-0 mx-3 mt-3 z-index-1">
        <img src="{{asset('img/404.svg')}}" class="img-fluid border-radius-lg">
      </div>
    
      <div class="card-body pt-2">
        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">404</span>
        <a href="javascript:;" class="card-title h5 d-block text-darker">
          Página no encontrada
        </a>
        <p class="card-description mb-4">
          Haz click en el boton <i class="fas fa-home text-info mb-0"></i> para regresar al Home
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
