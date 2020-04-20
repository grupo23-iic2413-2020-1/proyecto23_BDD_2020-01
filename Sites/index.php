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
    <input type="text" name="pnombre">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> ¿Buscar Paises donde ha alojado un usuario?</h3>

  <form align="center" action="consultas/consulta_3.php" method="post">
    Username:
    <input type="text" name="username">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> ¿Buscar dinero gastado en tickets por un id de usuario?</h3>

  <form align="center" action="consultas/consulta_4.php" method="post">
    Id:
    <input type="text" name="uid">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

</body>
</html>
