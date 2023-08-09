{{-- Estudio --}}
<div id="estudio" class="mt-5- pt-5" style="background-color: #404E58"> 
    
</div>
<div class="container-fluid" style="background-color: #404E58">
    <div class="row mt-5- py-5">
        <div class="col-12">
            <h2 class="text-light display-1 wow animate__animated animate__fadeIn">Estudio</h2>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @for ($i = 1; $i < 5; $i++)
            <div class="col">
            <img src="img/estudio/{{$i}}.jpg" class="card-img-top rounded-3 wow animate__animated animate__fadeIn" alt="Hollywood Sign on The Hill"/>
            </div>
            @endfor
        </div>
        </div>
    </div>
</div>