<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fire House Tattoo PV</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
        />
        <!-- MDB -->
        <link rel="stylesheet" href="css/mdb.min.css" />

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
            
        </style>
    </head>
    <body class="antialiased">
      <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark- fixed-top" style="background-color: #121517">
          <div class="container-fluid">
            <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarExample01"
              aria-controls="navbarExample01"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
              <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img
                  src="img/firehouse-logo.png"
                  class="me-2"
                  {{-- class="me-2" --}}
                  height="50"
                  alt="Fire House Logo"
                  loading="lazy"
                />
              </a>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                  >
                  Artistas
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                      <a class="dropdown-item" href="#">Carlos</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Mario</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">RekZone</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Luis Carlos</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Tattoos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Piercings</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Reserva</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Conócenos</a>
                </li>
              </ul>
            </div>
            <!-- Right elements -->
            <div class="d-flex align-items-center">
              <!-- Icon -->
              <a class="text-light me-3" href="https://www.facebook.com/firehousetattoomx">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="text-light me-3" href="https://www.instagram.com/firehouse_tattoo/">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
            <!-- Right elements -->
          </div>
        </nav>
        <!-- Navbar -->
      
        <!-- Background image -->
        <div class="p-5 text-center bg-image"
          style="
            background-image: url('/img/header.jpg');
            height: 600px;
          "
        >
          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
              <img
                  src="img/firehouse-logo.png"
                  class="me-2 img-fluid"
                  {{-- class="me-2" --}}
                  alt="Fire House Logo"
                  loading="lazy"
                />
            </div>
          </div>
        </div>
        <!-- Background image -->
      </header>
      <div class="container my-5 py-5">
        <div class="row">
          <div class="col-md-6">
            <div class="card rounded-3 mb-3">
              <div class="row g-0">
                <div class="col-md-4 py-3 ps-3">
                  <img
                      alt="example"
                      class="img-fluid rounded-circle"
                      src="img/team/carlos.jpg"
                    />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Carlos</h5>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, reiciendis.
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
          <div class="col-md-6">
            <div class="card rounded-3 mb-3">
              <div class="row g-0">
                <div class="col-md-4 py-3 ps-3">
                  <img
                      alt="example"
                      class="img-fluid rounded-circle"
                      src="img/team/mario.jpg"
                    />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Mario</h5>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, reiciendis.
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
          <div class="col-md-6">
            <div class="card rounded-3 mb-3">
              <div class="row g-0">
                <div class="col-md-4 py-3 ps-3">
                  <img
                      alt="example"
                      class="img-fluid rounded-circle"
                      src="img/team/RekZone.jpg"
                    />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">RekZone</h5>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, reiciendis.
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
          <div class="col-md-6">
            <div class="card rounded-3 mb-3">
              <div class="row g-0">
                <div class="col-md-4 py-3 ps-3">
                  <img
                      alt="example"
                      class="img-fluid rounded-circle"
                      src="img/team/Lukas.jpg"
                    />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Luis Carlos</h5>
                    <p class="card-text">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, reiciendis.
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
      </div>
      <div class="container-fluid" style="background-color: #273036">
        <div class="row mt-5 py-5">
          <div class="col-sm-12 col-lg-7">
            <div class="row row-cols-1 row-cols-md-3 g-4">
              @for ($i = 1; $i < 10; $i++)
              <div class="col">
                <img src="img/tattoos/{{$i}}.jpg" class="card-img-top rounded-3" alt="Hollywood Sign on The Hill"/>
                {{-- <div class="card">
                  
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                      
                    </p>
                  </div>
                </div> --}}
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
      {{-- Mapa --}}
      <div class="container mt-5 py-5">
        <div class="card mb-3">
          <div class="row g-0">
            
            <div class="col-md-4">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  This is a wider card with supporting text below as a natural lead-in to
                  additional content. This content is a little bit longer.
                </p>
                <p class="card-text">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </p>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1866.7172970785725!2d-105.2424963960451!3d20.651890811271684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8421451d6d157959%3A0x7a3500878c2ff4e4!2sFirehouse%20tattoo!5e0!3m2!1ses!2smx!4v1668148705204!5m2!1ses!2smx" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="container-fluid my-5 py-5" >
        <div class="row g-0">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-lg-4 col-md-12">
                <img
                  src="img/horario.jpg"
                  alt="Trendy Pants and Shoes"
                  class="img-fluid"
                />
              </div>
              <div class="col-lg-8 col-md-12">
                <div class="card-body">
                  <h5 class="card-title text-center pb-3">
                    Información
                  </h5>
                  <hr class="hr hr-blurry" />
                  <div class="row justify-content-center align-items-center text-center g-2 my-5 py-5">
                    <div class="col-lg-4 col-md-8 col-sm-12 mb-5">
                      <h6 class="">Horaio <i class="fas fa-clock"></i></h6>
                      <ul class="list-group ">
                        <li class="list-group-item border-0">Lunes a Viernes de 10:00 - 19:00</li>
                        <li class="list-group-item border-0">Sábado 10:00 - 17:00</li>
                        <li class="list-group-item border-0 text-muted">Domigo - Cerrado</li>
                      </ul>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12 mb-5">
                      <h6 class="">Dirección</h6>
                      <p class="card-text ">
                        Playa de Oro, Puerto Vallarta, Mexico, 48333 Dirección
                      </p>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12 mb-5">
                      <h6 class="">Contácto</h6>
                      <p class="card-text ">
                        <a href=" https://wa.me/+5213222917850" target="_Blank"><i class="fab fa-whatsapp"></i> 322 291 7850</a>
                        
                      </p>
                    </div>
                  </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,288L48,282.7C96,277,192,267,288,240C384,213,480,171,576,154.7C672,139,768,149,864,181.3C960,213,1056,267,1152,250.7C1248,235,1344,149,1392,106.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
      <footer class="bg-dark- text-center text-white" style="background-color: #273036">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-facebook-f"></i
            ></a>
      
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-instagram"></i
            ></a>
      
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © <script>
            document.write(new Date().getFullYear())
          </script>,
          <a class="text-white" href="https://rozosmedia.com/" target="_Blank">RozosMedia.com</a>
        </div>
        <!-- Copyright -->
      </footer>
        
      <!-- MDB -->
      <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>
