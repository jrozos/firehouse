{{-- Piercings --}}
<div id="piercings" class="mt-5- pt-5" style="background-color: #333F47"> 
    
</div>
<div class="container-fluid" style="background-color: #333F47">
    <div class="row mt-5- py-5">
        <div class="col-12">
            <h2 class="text-light text-end display-1">Piercings</h2>
        </div>
    </div>
    <div class="row pb-5">
        <div class="col-sm-12 col-lg-7">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @for ($i = 1; $i < 4; $i++)
            <div class="col">
            <img src="img/piercings/{{$i}}.jpg" class="card-img-top rounded-3" alt="Hollywood Sign on The Hill"/>
            </div>
            @endfor
        </div>
        </div>
        <div class="col-sm-12 col-lg-5 my-4 my-lg-0">
        <div class="card rounded-3">
            <img src="img/banner_2.jpg" class="card-img-top" alt="Fissure in Sandstone"/>
            <div class="card-body">
            <h5 class="card-title">Luis Carlos</h5>
            <p class="card-text">Como licenciado en enfermería   siempre eh buscado la manera de brindar la atención y los mejores cuidados a las personas, como perforador me permite ir mas allá y puedo hacer que las personas se sientan seguros de si mismas o pueda  resaltar alguna parte de su cuerpo. <br><br>
                Dense la oportunidad de visitarnos ponerse un piercing y lograr un mejor estado fisico y emocional con un detalle como este.</p>
            </div>
        </div>
        </div>
    </div>
</div>