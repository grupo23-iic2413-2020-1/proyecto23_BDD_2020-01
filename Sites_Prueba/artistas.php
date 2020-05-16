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
      <?php 
        # Muestra una tabla con todos los artistas

          #Llama a conexión, crea el objeto PDO y obtiene la variable $db
          require("../config/conexion.php");

          #Se construye la consulta como un string
          $query = "SELECT anombre, aid FROM Artista;";

          #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
          $result = $db_2 -> prepare($query);
          $result -> execute();
          $artistas = $result -> fetchAll();
          
      ?>
      <div class="container">

        <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Artistas</h1>

          <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

            <thead class="thead-dark">
              <tr style="text-align:center">
                <th>Artista</th>
              </tr>
            </thead>
            <tbody>

              <?php
                foreach ($artistas as $artista) {
                  echo "<tr><td><a href='artista_info.php?aid=$artista[1]&anombre=$artista[0]'>$artista[0]</a></td></tr>";
              }
              ?>
            </tbody>
          </table>
      </div>
    </div>
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
