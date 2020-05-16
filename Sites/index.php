<?php include('templates/header.html');   ?>

<?php include('templates/navbar.php');   ?> 


<body class= "bg-secondary text-white">
  <div class="container">
    
    <br>

    <h1 class= "text-white" align="center">Entrega 3 BDD Grupos 23 y 50 </h1>
    <br>
    <h3 class= "text-white" align="center">Splinter S.A.</h3>

    <div class="row">
      <div class="col">
        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC7" aria-expanded="false" aria-controls="collapseC7">
        Artistas
        </button>

        <div class="collapse" id="collapseC7">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Mostrar Artistas existentes?</h3>

            <form align="center" action="consultas/artistas.php" method="post">
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
