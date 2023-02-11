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
                            src="img/team/aida.jpg"
                        />
                    </div>
                    <div class="col-md-8 col-lg-10">
                        <div class="card-body">
                        <h3 class="card-title">Aida</h3>
                        <p class="card-text">
                            Soy Aida y estoy aprendiendo el arte del tatuaje, empecé hace tres meses a practicar en piel real. He estado aprendiendo desde hace tiempo la teoría del tatuaje gracias a mi esposo a quien he visto tatuar desde hace años. 
Me gustas pintar desde muy joven, en especial hacer retratos en acuarela y lápiz. <br><br>
La pintura ha sido de gran influencia y me ha hecho mejorar bastante en mis tatuajes. Espero ser una gran artista, y mejorar cada día mis tatuajes.


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
            
                @for ($i = 1; $i < 10; $i++)
                <div class="col">
                <img src="img/tattoos/{{$i}}.jpg" class="card-img-top rounded-3" alt="Hollywood Sign on The Hill"/>
                </div>
                @endfor
        </div>
    </div>
</div>
@endsection
