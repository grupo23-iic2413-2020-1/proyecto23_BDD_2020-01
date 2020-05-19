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
  
  $query_2 = "SELECT cnombre, cid FROM Ciudad;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result_2 = $db_2 -> prepare($query_2);
	$result_2 -> execute();
	$ciudades = $result_2 -> fetchAll();

?>


<button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC1" aria-expanded="false" aria-controls="collapseC7">
  Elige tu fecha
  </button>

  <div class="collapse" id="collapseC1">
    <div class="card card-body bg-secondary text-white">
      <form align="center" action="#" method="post">
        <label for="birthdaytime">Fecha: </label>
        <input style="width: 10em; height: 1em; font-size: 20px" type="date" id="birthdaytime" name="birthdaytime">
      </form>
      <br/><br/>
      </div>
    </div>
  </div>


<div class="row">
      <div class="col">
        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC2" aria-expanded="false" aria-controls="collapseC1">
        Elige a tus artistas
        </button>

        <div class="collapse" id="collapseC2">
          <div class="card card-body bg-secondary text-white">
            <form align="center" action="#" method="post">
              <p>
              Artistas:<br>
              <?php
                foreach ($artistas as $artista) {
                echo "<label><input type='checkbox' name=$artista[1] value='yes'> $artista[0]</label><br>";
              }
              ?>
            </form>
          </div>
        </div>
      </div>
      <div class="col">

      <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC3" aria-expanded="false" aria-controls="collapseC2">
        Ciudades
        </button>

        <div class="collapse" id="collapseC3">
          <div class="card card-body bg-secondary text-white">
            <div class="container">
              <!--<h3 align="center"> Elige una ciudad</h3>-->
                <div class="form-group">
                  <label for="sel1">Elige una ciudad</label>
                  <select class="form-control" id="sel1">
                    <?php
                      foreach ($ciudades as $ciudad) {
                      echo "<option name=$ciudad[1] value='ok'>$ciudad[0]</option>";
                      }
                    ?>
                  </select>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('../templates/footer.html'); ?>