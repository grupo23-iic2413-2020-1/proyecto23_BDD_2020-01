<?php session_start();
$_SESSION["base_url"] = '//'.trim($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], '/index.php'); 
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
          <a role="button" href="#" class="btn btn-success">Ver más</a>
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

    <h1 class= "text-white" align="center">Entrega 3 BDD Grupos 23 y 50 </h1>
    <br>
    <h2 class= "text-white" align="center">Conoce a nuestros fundadores</h2>
  </div>
  <br>
  <div class="container">
  <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-6">
                            <h3 class="mb-0 text-truncated" style='color: black'>Clemente Maruri</h3>
                            <p class="lead" style='color: black'>Huaso/ Al peo</p>
                            <p style='color: black'>
                              Brindo por las fondas
                              porque siempre me han gustado
                              pero apuesto que este año
                              pucha que las paso encerrao'
                            </p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center">
                            <img src="imagenes_perfil/tito.jpg" alt="" class="mx-auto rounded-circle img-fluid">
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
                            <h3 class="mb-0" style='color: black'>5</h3>
                            <small style='color: black'>Followers</small>
                            <button class="btn btn-block btn-outline-success"><span class="fa fa-plus-circle"></span> Follow</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>56k</h3>
                            <small style='color: black'>Following</small>
                            <button class="btn btn-outline-info btn-block"><span class="fa fa-user"></span> View Profile</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>3</h3>
                            <small style='color: black'>Ramos echados</small>
                            <button type="button" class="btn btn-outline-primary btn-block"><span class="fa fa-gear"></span> Options</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-6">
                            <h3 class="mb-0 text-truncated" style='color: black'>Diego Fluxá</h3>
                            <p class="lead" style='color: black'>Cazador de monos/ Preferencia orangutanes</p>
                            <p style='color: black'>
                                Monos y monadas, locuras que me atraen
                            </p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center">
                            <img src="imagenes_perfil/diego.jpg" alt="" class="mx-auto rounded-circle img-fluid">
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
                            <h3 class="mb-0" style='color: black'>5</h3>
                            <small style='color: black'>Followers</small>
                            <button class="btn btn-block btn-outline-success"><span class="fa fa-plus-circle"></span> Follow</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>56k</h3>
                            <small style='color: black'>Following</small>
                            <button class="btn btn-outline-info btn-block"><span class="fa fa-user"></span> View Profile</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>3</h3>
                            <small style='color: black'>Ramos echados</small>
                            <button type="button" class="btn btn-outline-primary btn-block"><span class="fa fa-gear"></span> Options</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-6">
                            <h3 class="mb-0 text-truncated" style='color: black'>Juan Pablo Correa</h3>
                            <p class="lead" style='color: black'>Tenista/ Pero piola</p>
                            <p style='color: black'>
                                Mi pasión por diseñar páginas web no tiene límites
                            </p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center">
                            <img src="imagenes_perfil/pelao.jpeg" alt="" class="mx-auto rounded-circle img-fluid">
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
                            <h3 class="mb-0" style='color: black'>5</h3>
                            <small style='color: black'>Followers</small>
                            <button class="btn btn-block btn-outline-success"><span class="fa fa-plus-circle"></span> Follow</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>56k</h3>
                            <small style='color: black'>Following</small>
                            <button class="btn btn-outline-info btn-block"><span class="fa fa-user"></span> View Profile</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>3</h3>
                            <small style='color: black'>Ramos echados</small>
                            <button type="button" class="btn btn-outline-primary btn-block"><span class="fa fa-gear"></span> Options</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-6">
                            <h3 class="mb-0 text-truncated" style='color: black'>Felipe Lira</h3>
                            <p class="lead" style='color: black'>Chef/ Sólo huevos revueltos</p>
                            <p style='color: black'>
                                Amante de los datos y todo lo que son sus bases
                            </p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center">
                            <img src="imagenes_perfil/lira.jpeg" alt="" class="mx-auto rounded-circle img-fluid">
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
                            <h3 class="mb-0" style='color: black'>14</h3>
                            <small style='color: black'>Followers</small>
                            <button class="btn btn-block btn-outline-success"><span class="fa fa-plus-circle"></span> Follow</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>Caleta</h3>
                            <small style='color: black'>Following</small>
                            <button class="btn btn-outline-info btn-block"><span class="fa fa-user"></span> View Profile</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0" style='color: black'>F</h3>
                            <small style='color: black'>Ramos echados</small>
                            <button type="button" class="btn btn-outline-primary btn-block"><span class="fa fa-gear"></span> Options</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <br>
</body>
</html>
