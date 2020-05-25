<?php session_start();
include('templates/header.html');   
include('templates/navbar.php');   
$_SESSION["base_url"] = trim($_SERVER['PHP_SELF'], '/index.php');
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
          <a role="button" href="/~grupo23/navegacion/itinerario.php" class="btn btn-success">Ir</a>
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

    <p class= "text-white" align="center">base_url:<?php echo $_SESSION['base_url']?></p>
    <p class= "text-white" align="center">PHP_SELF:<?php echo $_SERVER['PHP_SELF']?></p>
    <p class= "text-white" align="center">REQUEST_SCHEME:<?php echo $_SERVER['REQUEST_SCHEME']?></p>
    <p class= "text-white" align="center">APP_URL:<?php echo $_SERVER['APP_URL']?></p>
    <p class= "text-white" align="center">DOCUMENT_ROOT:<?php echo $_SERVER['DOCUMENT_ROOT']?></p>
    <p class= "text-white" align="center">SERVER_PORT:<?php echo $_SERVER['SERVER_PORT']?></p>
    <p class= "text-white" align="center">SERVER_NAME:<?php echo $_SERVER['SERVER_NAME']?></p>
    <p class= "text-white" align="center">HTTP_HOST:<?php echo $_SERVER['HTTP_HOST']?></p>
    <p class= "text-white" align="center">HTTP_REFERER:<?php echo $_SERVER['HTTP_REFERER']?></p>
    <p class= "text-white" align="center">HTTPS:<?php echo $_SERVER['HTTPS']?></p>
    <p class= "text-white" align="center">REMOTE_HOST:<?php echo $_SERVER['REMOTE_HOST']?></p>
    <p class= "text-white" align="center">PATH_TRANSLATED:<?php echo $_SERVER['PATH_TRANSLATED']?></p>
    <p class= "text-white" align="center">REMOTE_ADDR:<?php echo $_SERVER['REMOTE_ADDR']?></p>
    <p class= "text-white" align="center">REQUEST_URI:<?php echo $_SERVER['REQUEST_URI']?></p>
    <p class= "text-white" align="center">PATH_INFO:<?php echo $_SERVER['PATH_INFO']?></p>
    <p class= "text-white" align="center">ORIG_PATH_INFO:<?php echo $_SERVER['ORIG_PATH_INFO']?></p>
  </div>
  <br>
  <br>
</body>
</html>
