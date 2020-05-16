<?php include('templates/header.html');   ?>


<body class= "bg-secondary text-white">
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>About</li>
          </ol>
        </div>

      </div>
  </section><!-- End Breadcrumbs -->
  <section id="about-us" class="about-us">
    <div class="container">
      
      <br>
      <h1 class= "text-white" align="center">Entrega 2 BDD Grupo 23 </h1>
      <br>
      <h3 class= "text-white" align="center">Splinter S.A.</h3>
      <br>
      <p class= "text-white" align="left">En esta página podrás realizar múltiples consultas a la bases de datos de Splinter S.A., las cuales se encontrarán epxplicadas al final de esta página</p>
      <p class= "text-white" align="left">A continuación deberás presionar el botón correspondiente a la consulta que quieres realizar.</p>
      
      

      <br>
      

      <div class="row">
        <div class="col" >
            <div class="card card-body bg-secondary text-white">
              <h3 align="center"> ¿Mostrar Usuarios y Correos?</h3>

              <form align="center" action="consultas/consulta_1.php" method="post">
                <input class="btn btn-primary" type="submit" value="Ejecutar">
              </form>
            </div>
        </div>
        <div class="col">

          <div class="card card-body bg-secondary text-white">
              <h3 align="center"> ¿Buscar ciudades de un país?</h3>

              <form align="center" action="consultas/consulta_2.php" method="post">
                Pais:
                <input class="w-25" type="text" name="pnombre">
                <br/><br/>
                <input class="btn btn-primary" type="submit" value="Buscar">
              </form>
          </div>
        </div>
      </div>

      <br>
      <br>

      <div class="row">
        <div class="col">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Buscar Paises donde ha alojado un usuario?</h3>

            <form align="center" action="consultas/consulta_3.php" method="post">
              Username:
              <input class="w-25" type="text" name="username">
              <br/><br/>
              <input class="btn btn-primary" type="submit" value="Buscar">
            </form>
          </div>
          
        </div>

        <div class="col">

          <div class="card card-body bg-secondary text-white">
              <h3 align="center"> ¿Buscar dinero gastado en tickets por un id de usuario?</h3>

            <form align="center" action="consultas/consulta_4.php" method="post">
              Id:
              <input class="w-25" type="text" name="uid">
              <br/><br/>
              <input class="btn btn-primary" type="submit" value="Buscar">
            </form>
          </div>



        </div>
      </div>

      <br>
      <br>

      <div class="row">
        <div class="col">

          <div class="card card-body bg-secondary text-white">
              <h3 align="center"> ¿Mostrar Reservas entre 2020-01-01 y 2020-03-31?</h3>

              <form align="center" action="consultas/consulta_5.php" method="post">
                <input class="btn btn-primary" type="submit" value="Ejecutar">
              </form>
          </div>
        </div>
        
        <div class="col">


          <div class="card card-body bg-secondary text-white">
              <h3 align="center"> ¿Buscar dinero gastado en tickets en un rango de fechas (YYYY-MM-DD)?</h3>

              <form align="center" action="consultas/consulta_6.php" method="post">
                Fecha inicio:
                <input class="w-25" type="text" name="fecha1">
                <br/>
                Fecha fin:
                <input class="w-25" type="text" name="fecha2">
                <br/><br/>
                <input class="btn btn-primary" type="submit" value="Buscar">
              </form>            
          </div>
        </div>
      </div>

      <br>
      <br>

      <div class="row">
        <div class="col">


          <div class="card card-body bg-secondary text-white">
              <h3 align="center"> ¿Mostrar Artistas existentes?</h3>

              <form align="center" action="consultas/consulta_7.php" method="post">
                <input class="btn btn-primary" type="submit" value="Ejecutar">
              </form>
          </div>
        </div>
        <div class="col">

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




      <br>

      <p class= "text-white" align="left">Las consultas consisten en:</p>
      
      <p class= "text-white" align="left">  Consulta 1: Muestra todos los username junto a su correo.</p>
      <p class= "text-white" align="left">  Consulta 2: Ingrese el nombre de un país y se mostrarán todos los nombres de las ciudades de ese país.</p>
      <p class= "text-white" align="left">  Consulta 3: Ingrese un username y se mostrarán todos los nombres distintos de países en los que ha
        hospedado el usuario con ese username mediante hoteles de la agencia.</p>
      <p class= "text-white" align="left">  Consulta 4: Ingrese el identificador de un usuario y se mostrará la cantidad de dinero que ha gastado el
        usuario con ese identificador en todos los tickets que ha comprado.</p>
        <p class= "text-white" align="left">  Consulta 5: Se muestra el identificador y nombre de usuario junto a la fecha de inicio en formato
        YYYY-MM-DD, la fecha de término y el nombre del hotel de las reservas que parten desde
        el 01 de enero del 2020 y terminan antes del 31 de marzo del 2020, ambas fechas
        inclusive.</p>
      <p class= "text-white" align="left">  Consulta 6: Ingrese dos fechas en formato YYYY-MM-DD: una de inicio y una de fin y se mostrarán el id,
        nombre de usuario y el total de dinero gastado en tickets entre esas dos fechas, ambas
        inclusive.</p>
      <p class= "text-white" align="left">  Consulta 7: Muestra todos los artistas de la base de datos</p>
      <p class= "text-white" align="left">  Consulta 8: Ingrese un país y se presentarán todos los museos del país que contengan obras del renacimiento</p>
    </div>
    <br>
    <br>
  </section>
  </main>


 

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
