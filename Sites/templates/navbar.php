<?php session_start();
$base_url = $_SESSION["base_url"];?> 
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-success" href="<?php echo $base_url ?>/index.php"><b>Splinter S.A.</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $base_url ?>/index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $base_url ?>/index_E2.php">Preguntas Frecuentes</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">Hoteles</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Que ver
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo $base_url ?>/navegacion/artistas.php">Artistas</a>
          <a class="dropdown-item" href="<?php echo $base_url ?>/navegacion/obras.php">Obras</a>
          <a class="dropdown-item" href="<?php echo $base_url ?>/navegacion/lugares.php">Lugares</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Realizar Reserva</a>
          <a class="dropdown-item" href="<?php echo $base_url ?>/navegacion/itinerario.php">Crear Itinerario</a>
          <a class="dropdown-item" href="<?php echo $base_url ?>/navegacion/comprar_ticket.php">Comprar Ticket</a>
        </div>
      </li>
      

      
    </ul>
    <?php if ($_SESSION["loggedin"] == 1) { ?>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['current_username'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href='<?php echo $base_url ?>/navegacion/perfil.php'> Perfil </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href='<?php echo $base_url ?>/navegacion/log_out.php'> Cerrar sesión </a>
          </div>
        </li>
      </ul>
    <?php } else { ?>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item active">
          <a class="nav-link btn-outline-success" href="<?php echo $base_url ?>/navegacion/registration.php">Registrarse</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link btn-outline-secondary" href="<?php echo $base_url ?>/navegacion/log_in.php">Iniciar Sesion</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#"><?php echo $_SESSION['current_username']; ?></a>
        </li>
      </ul> 
      
    <?php } ?>
  </div>
</nav>
<br>
<br>
