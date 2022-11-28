{{-- Tattoos --}}
<div id="tattoos"> 
</div>
<div class="container-fluid" style="background-color: #273036">
    <div class="row mt-5 py-5">
        <div class="col-sm-12 col-lg-7">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @for ($i = 1; $i < 10; $i++)
            <div class="col">
            <img src="img/tattoos/{{$i}}.jpg" class="card-img-top rounded-3" alt="Hollywood Sign on The Hill"/>
            </div>
            @endfor
        </div>
        </div>
        <div class="col-sm-12 col-lg-5 my-4 my-lg-0">
        <div class="card rounded-3">
            <img src="img/banner.jpg" class="card-img-top" alt="Fissure in Sandstone"/>
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        </div>
    </div>
</div>