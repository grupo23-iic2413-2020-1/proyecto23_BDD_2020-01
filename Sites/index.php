<?php session_start();
include('templates/header.html');   
include('templates/navbar.php'); 
?> 

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox" style=" width:100%; height: 600px !important;">
    <div class="carousel-item active">
      <img src="img/carousel/slide_welcome.jpg" style=" width:100%; height: 600px">
      <div class="carousel-caption d-none d-md-block " >
        <div class="card bg-secondary">
          <h1>Bienvenido a Splinter S.A</h1>
          <p>Aquí encontrarás todo lo necesario para realizar el viaje artístico de tu vida</p>
          <a role="button" href="#nosotros" class="btn btn-success">Ver más</a>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/carousel/slide_itinerario.jpg" style=" width:100%; height: 600px">
      <div class="carousel-caption d-none d-md-block">
        <div class="card bg-secondary">
          <h1>¡Crea un itinerario!</h1>
          <p>Con nuestra ayuda puedes crear un itinerario de viajes para visitar todas las obras 
            de tus artistas favoritos de manera rápida y sencilla</p>
          <a role="button" href="navegacion/itinerario.php" class="btn btn-success">Ir</a>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/carousel/slide_artistas.jpg" style=" width:100%; height: 600px">
      <div class="carousel-caption d-none d-md-block">
        <div class="card bg-secondary">
          <h1>Conoce a nuestros artistas</h1>
          <p>Aquí, puedes explorar a todos los artistas disponibles para crear tu viaje, conocer sus obras, donde se presentan estas y mucho más.</p>
          <a role="button" href="navegacion/artistas.php" class="btn btn-success">Ir</a>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- End Carousel -->
<body class= "bg-secondary text-white">
  <div class="container">
    <br>
    <br>
<a id="nosotros">
    <h1 style="padding-top: 50px; margin-top: -50px;"></h1>
</a>
    <h1 class= "text-white" align="center">Entrega 5 BDD Grupos 23 y 50 </h1>
    <br>

    <h2 class= "text-white" align="center">Quiénes somos</h2>
  </div>
  <br>
  <div class="container">
            <div class="card" style="width: 33.8rem;margin:0 auto;" >
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-6">
                            <h3 class="mb-0 text-truncated" style='color: black'>Splinter S.A</h3>
                            <p class="lead" style='color: black'>Ofrecemos turismo de verdad</p>
                            <p style='color: black; text-align: justify'>
                              Durante el año 2020 se celebran 500 años de la muerte de Raffaello Sanzio, 
                              conocido simplemente como Rafael, quien es uno de los más célebres pintores
                              y arquitectos del renacimiento. Es por esto, que ha surgido Splinter S.A, una empresa que
                              busca que gente alrededor de todo el mundo planee
                              hacer viajes para conocer personalmente todas las obras de este gran artista.
                            </p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center">
                            <img src="img/perfil/logo_mundo.jpg" alt="" class="mx-auto rounded-circle img-fluid">
                            <br>
                            <ul class="list-inline ratings text-center" title="Ratings">
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>52k</h3>
                            <small style='color: black'>Followers</small>
                            <button class="btn btn-block btn-outline-success"><span class="fa fa-plus-circle"></span> Follow</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>30k</h3>
                            <small style='color: black'>Following</small>
                            <button class="btn btn-outline-info btn-block"><span class="fa fa-user"></span> View Profile</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>1°</h3>
                            <small style='color: black'>Ranking Agencias</small>
                            <button type="button" class="btn btn-outline-primary btn-block"><span class="fa fa-gear"></span> Options</button>
                        </div>
                    </div>
                </div>
            </div>
    <br>
    
  </div>
  <br>
  <form class="form-inline justify-content-center" action="navegacion/busqueda.php" method="post">
    <input class="form-control mr-sm-1" type="text" placeholder="Búsqueda" name="busqueda">
    <button class="btn btn-success" type="submit">Buscar</button>
  </form>
  <div class="btn-group" role="group" aria-label="accesos_emergencia">
  <?php if ($_SESSION["loggedin"] == 1) { ?>
  <a role="button" href='navegacion/perfil.php' class="btn btn-dark">Perfil</a>
  <a role="button" href='navegacion/log_out.php' class="btn btn-dark">Cerrar Sesión</a><?php }
  else {?> 
  <a role="button" href='navegacion/registration.php' class="btn btn-dark">Registrarse</a>
  <a role="button" href='navegacion/log_in.php' class="btn btn-dark">Iniciar Sesión</a>
  <?php } ?>
  <a role="button" href='index_E2.php' class="btn btn-dark">Consultas</a>
  <a role="button" href='navegacion/ver_hoteles.php' class="btn btn-dark">Hoteles</a>
  <a role="button" href='navegacion/artistas.php' class="btn btn-dark">Artistas</a>
  <a role="button" href='navegacion/obras.php' class="btn btn-dark">Obras</a>
  <a role="button" href='navegacion/lugares.php' class="btn btn-dark">Lugares</a>
  <a role="button" href='navegacion/ver_hoteles.php' class="btn btn-dark">Reserva</a>
  <a role="button" href='navegacion/itinerario.php' class="btn btn-dark">Itinerario</a>
  <a role="button" href='navegacion/comprar_ticket.php' class="btn btn-dark">Ticket</a>
  
</div>
</body>
</html>
