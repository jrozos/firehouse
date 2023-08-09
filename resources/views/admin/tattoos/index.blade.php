{{-- Tattoos --}}
<div id="tattoos" class="mt-5- pt-5" style="background-color: #273036">   
</div>
<div class="container-fluid" style="background-color: #273036">
    <div class="row mt-5- py-5">
        <div class="col-lg-10 col-md-8 col-sm-12">
            <h2 class="text-light display-1 wow animate__animated animate__fadeIn">Tattoos</h2>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-sm-12 col-lg-7">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @for ($i = 1; $i < 10; $i++)
            <div class="col">
            <img src="img/tattoos/{{$i}}.jpg" class="card-img-top rounded-3 wow animate__animated animate__fadeIn" alt="Hollywood Sign on The Hill"/>
            </div>
            @endfor
        </div>
        </div>
        <div class="col-sm-12 col-lg-5 my-4 my-lg-0">
        <div class="card rounded-3 wow animate__animated animate__fadeIn">
            <img src="img/banner.jpg" class="card-img-top" alt="Fissure in Sandstone"/>
            <div class="card-body">
            <h5 class="card-title">Carlos Munguia</h5>
            <p class="card-text wow animate__animated animate__fadeIn">¡Hola! Mi nombre es Carlos Munguía, tengo 27 años de edad y cuento con 8 años en la práctica del tatuaje, pero solo 4 años cómo tatuador de tiempo completo. <br><br>
                Mi carrera como artista me ha llevado a tatuar a otros países y eso ha influido mucho en el desarrollo y práctica en varios estilos de tatuaje. He sido reconocido por mi habilidad en tatuajes a color y en micro realismo donde intento plasmar el mayor detalle a tatuajes pequeños y minuciosos, y los colores más radiantes utilizándolos de manera armoniosa para la elaboración de un gran tatuaje. <br><br>
                Me considero un artista que pone atención al detalle y echa a volar su imaginación para crear diseños surrealistas llenos de vida y color. <br><br>
                Yo, junto con mi esposa Aida Hurtado Creamos y fundamos Firehouse Tattoo, un estudio cuyo concepto ha sido basado e influenciado por mi carrera como bombero profesional, una profesión que desempeñe en California. <br><br>
                No obstante, mi corazón con raíces mexicanas quedó anclado en nuestro bello Puerto Vallarta en donde decidimos sería hogar de nuestro estudio madre los headquarters de FIREHOUSE TATTOO.
                </p>
            </div>
        </div>
        </div>
    </div>
</div>