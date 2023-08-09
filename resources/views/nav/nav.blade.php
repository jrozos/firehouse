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
          <a class="navbar-brand mt-2 mt-lg-0" href="/">
            <img
              src="img/fh-logo-w.png"
              class="me-2"
              {{-- class="me-2" --}}
              height="75"
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
                  <a class="dropdown-item" href="/carlos">Carlos</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/mario">Mario</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/aida">Aida</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#tattoos">Tattoos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#estudio">Estudio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#reserva">Reserva</a>
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
              src="img/firehouse-logo.jpg"
              class="me-2 img-fluid wow animate__animated animate__slideInDown"
              {{-- class="me-2" --}}
              alt="Fire House Logo Banner"
              loading="lazy"
            />
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>