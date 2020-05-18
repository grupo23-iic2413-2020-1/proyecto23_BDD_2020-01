<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 

<body class= "bg-secondary text-white">
<?php 
  require("../config/conexion.php");

  #Se construye la consulta como un string
  $query = "SELECT anombre, aid FROM Artista;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db_2 -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();

?>


<button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC11" aria-expanded="false" aria-controls="collapseC7">
  Elige tu fecha
  </button>

  <div class="collapse" id="collapseC11">
    <div class="card card-body bg-secondary text-white">
      <form action="/action_page.php">
        <label for="birthdaytime">Fecha: </label>
        <input type="date" id="birthdaytime" name="birthdaytime">
        <input class="btn btn-primary" type="submit" value="Buscar">
      </form>
      <br/><br/>
      </div>
    </div>
  </div>


<div class="row">
      <div class="col">
        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC1" aria-expanded="false" aria-controls="collapseC1">
        Artistas
        </button>

        <div class="collapse" id="collapseC1">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Mostrar Usuarios y Correos?</h3>

            <form align="center" action="consultas/consulta_1.php" method="post">
              <input class="btn btn-primary" type="submit" value="Ejecutar">
            </form>
          </div>
        </div>
      </div>
      <div class="col">

      <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC2" aria-expanded="false" aria-controls="collapseC2">
        Consulta 2
        </button>

        <div class="collapse" id="collapseC2">
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
    </div>
  </div>

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

<?php include('../templates/footer.html'); ?>