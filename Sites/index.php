<?php include('templates/header.html');   ?>

<body>

  <h1 align="center">Entrega 2 BDD </h1>

  <h3 align="center"> ¿Mostrar Usuarios y Correos?</h3>

  <form align="center" action="consultas/consulta_1.php" method="post">
    <input type="submit" value="Ejecutar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> ¿Buscar ciudades de un país?</h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    Pais:
    <input type="text" name="nombre_pais">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> ¿Buscar Paises donde ha alojado un usuario?</h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    Username:
    <input type="text" name="nombre_pais">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>




  <h1 align="center">Biblioteca Pokemón </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre pokemones.</p>

  <br>

  <h3 align="center"> ¿Quieres buscar un Pokemón por tipo y/o nombre?</h3>

  <form align="center" action="consultas/consulta_tipo_nombre.php" method="post">
    Tipo:
    <input type="text" name="tipo_elegido">
    <br/>
    Nombre:
    <input type="text" name="nombre_pokemon">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres buscar un Pokemón por su ID?</h3>

  <form align="center" action="consultas/consulta_stats.php" method="post">
    Id:
    <input type="text" name="id_elegido">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres conocer los Pokemones más altos que: ?</h3>

  <form align="center" action="consultas/consulta_altura.php" method="post">
    Altura Mínima:
    <input type="text" name="altura">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">¿Quieres buscar todos los pokemones por tipo?</h3>

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT tipo FROM ejercicio_ayudantia;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_tipo.php" method="post">
    Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>
  <br>
</body>
</html>
