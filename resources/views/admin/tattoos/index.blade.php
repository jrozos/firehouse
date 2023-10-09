{{-- Tattoos --}}
<div id="tattoos" class="mt-5- pt-5" style="background-color: #273036">   
</div>
<div class="container-fluid" style="background-color: #273036">
    <div class="row mt-5- py-5">
        <div class="col-lg-10 col-md-8 col-sm-12">
            <h2 class="text-light display-1 wow animate__animated animate__fadeIn">Tattoos</h2>
        </div>
    </div>
    <div class="row row-cols-sm-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
        @for ($i = 1; $i < 10; $i++)
        <div class="col">
        <img src="img/tattoos/{{$i}}.jpg" class="card-img-top rounded-3 wow animate__animated animate__fadeIn" alt="Puerto Vallarta tattoo studio"/>
        </div>
        @endfor
    </div>
</div>