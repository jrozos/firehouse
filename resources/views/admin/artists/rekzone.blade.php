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
                            src="img/team/rekzone.jpg"
                        />
                    </div>
                    <div class="col-md-8 col-lg-10">
                        <div class="card-body">
                        <h3 class="card-title">RekZone</h3>
                        <p class="card-text">
                            "Rekzone” tatuador proveniente de Guadalajara jalisco actualmente vivo en Puerto Vallarta, artista urbano  hace aproximadamente 10 años , inicie en el mundo del tatuaje  experimentando  en varios estilos el cual desarrollando una combinación  de realismo fine line y Black Work  también influenciado por el arte del grafiti desde el 98
                        </p>
                                    <!-- Facebook -->
                        <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"
                            ><i class="fab fa-facebook-f"></i
                        ></a>
                    
                        <!-- Instagram -->
                        <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"
                            ><i class="fab fa-instagram"></i
                        ></a>
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
            
                @for ($i = 1; $i < 10; $i++)
                <div class="col">
                <img src="img/tattoos/{{$i}}.jpg" class="card-img-top rounded-3" alt="Hollywood Sign on The Hill"/>
                </div>
                @endfor
        </div>
    </div>
</div>
@endsection
