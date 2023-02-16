@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center  my-5 py-5">
        <div class=" col-md-10 col-lg-8">
            <div class="card rounded-3 mb-3">
                <div class="row g-0">
                    <div class="col-md-4 col-lg-2 py-3 ps-3">
                        <img
                            alt="example"
                            class="img-fluid rounded-circle"
                            src="img/team/mario.jpg"
                        />
                    </div>
                    <div class="col-md-8 col-lg-10">
                        <div class="card-body">
                        <h3 class="card-title">Mario</h3>
                        <p class="card-text">
                            Mario Garcia 23 años el tatuador más joven de estudio con 2 años de experiencia el el arte del tatuaje con una personalidad extrovertida y alegre enfocado mayormente en el estilo neotradicional y black work
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pb-5" style="background-color: #273036">
        <div class="row my-5 ">
            <div class="col-lg-10 col-md-8 col-sm-12">
                <h2 class="text-light display-1">Tattoos</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            
                @for ($i = 1; $i < 7; $i++)
                <div class="col">
                <img src="img/tattoos/mario/{{$i}}.jpg" class="card-img-top rounded-3" alt="Hollywood Sign on The Hill"/>
                </div>
                @endfor
        </div>
    </div>
</div>
@endsection
