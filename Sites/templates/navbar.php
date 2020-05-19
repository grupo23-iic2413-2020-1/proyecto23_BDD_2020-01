<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-success" href="/~grupo23/index.php"><b>Splinter S.A.</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/~grupo23/index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/~grupo23/index_E2.php">Preguntas Frecuentes</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/~grupo23/navegacion/artistas.php">Artistas</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Hoteles</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Realizar Reserva</a>
          <a class="dropdown-item" href="/~grupo23/navegacion/itinerario.php">Crear Itinerario</a>
        </div>
      </li>
      
    </ul>
    <?php if($current_user == NULL) { ?>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item active">
          <a class="nav-link btn-outline-success" href="~grupo23/navegacion/registration.php">Registrarse</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link btn-outline-secondary" href="~grupo23/navegacion/log_in.php">Iniciar Sesion</a>
        </li>
      </ul> 
    <?php } else { ?>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">My Profile</a>
        </li>
      </ul>
    <?php } ?>
  </div>
</nav>
<br>
<br>
