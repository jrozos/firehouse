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
                            src="img/team/carlos.jpg"
                        />
                    </div>
                    <div class="col-md-8 col-lg-10">
                        <div class="card-body">
                        <h3 class="card-title">Carlos</h3>
                        <p class="card-text">
                            ¡Hola! Mi nombre es Carlos Munguía, tengo 27 años de edad y cuento con 8 años en la práctica del tatuaje, pero solo 4 años cómo tatuador de tiempo completo. <br><br>
Mi carrera como artista me ha llevado a tatuar a otros países y eso ha influido mucho en el desarrollo y práctica en varios estilos de tatuaje. He sido reconocido por mi habilidad en tatuajes a color y en micro realismo donde intento plasmar el mayor detalle a tatuajes pequeños y minuciosos, y los colores más radiantes utilizándolos de manera armoniosa para la elaboración de un gran tatuaje. <br>
Me considero un artista que pone atención al detalle y echa a volar su imaginación para crear diseños surrealistas llenos de vida y color. 
Yo, junto con mi esposa Aida Hurtado Creamos y fundamos Firehouse Tattoo, un estudio cuyo concepto ha sido basado e influenciado por mi carrera como bombero profesional, una profesión que desempeñe en California. <br><br>
No obstante, mi corazón con raíces mexicanas quedó anclado en nuestro bello Puerto Vallarta en donde decidimos sería hogar de nuestro estudio madre los headquarters de FIREHOUSE TATTOO.

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
