<?php session_start();
include('templates/header.html');   ?>

<?php include('templates/navbar.php');   ?> 

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
          <a role="button" href="#" class="btn btn-success">Ir</a>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/carousel/slide_artistas.jpg" style=" width:100%; height: 600px">
      <div class="carousel-caption d-none d-md-block">
        <div class="card bg-secondary">
          <h1>Conoce a nuestros artistas</h1>
          <p>Aquí, puedes explorar a todos los artistas disponibles para crear tu viaje, conocer sus obras, donde se presentan estas y mucho más.</p>
          <a role="button" href="/~grupo23/navegacion/artistas.php" class="btn btn-success">Ir</a>
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

    <h5 class= "text-white" align="center">Entrega 3 BDD Grupos 23 y 50 </h5>
    <br>
    <p class= "text-white" align="center">Sección en desarrollo</p>




    <div class="row">
      <div class="col">
        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC7" aria-expanded="false" aria-controls="collapseC7">
        Artistas
        </button>

        <div class="collapse" id="collapseC7">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Mostrar Artistas existentes?</h3>

            <form align="center" action="navegacion/artistas.php" method="post">
              <input class="btn btn-primary" type="submit" value="Ejecutar">
            </form>
          </div>
        </div>
      </div>
      <div class="col">

      <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC8" aria-expanded="false" aria-controls="collapseC8">
        Consulta 8
        </button>

        <div class="collapse" id="collapseC8">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Buscar museos con obras del renacimiento de algún país?</h3>

            <form align="center" action="consultas/consulta_8.php" method="post">
              Pais:
              <input class="w-25" type="text" name="pnombre">
              <br/><br/>
              <input class="btn btn-primary" type="submit" value="Buscar">
            </form>
          </div>
        </div>
      </div>
    </div>

    <br>
  </div>
  <br>
  <br>
</body>
</html>
