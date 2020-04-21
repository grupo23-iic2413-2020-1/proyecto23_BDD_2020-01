<?php include('templates/header.html');   ?>

<body>
  <div class="container">
    <h1 align="center">Entrega 2 BDD </h1>

    <div class="row">
      <div class="col">

        <h3 align="center"> ¿Mostrar Usuarios y Correos?</h3>

        <form align="center" action="consultas/consulta_1.php" method="post">
          <input type="submit" value="Ejecutar">
        </form>

      </div>
      <div class="col">


        <h3 align="center"> ¿Buscar ciudades de un país?</h3>

        <form align="center" action="consultas/consulta_2.php" method="post">
          Pais:
          <input type="text" name="pnombre">
          <br/><br/>
          <input type="submit" value="Buscar">
        </form>
      </div>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
      <div class="col">
        <h3 align="center"> ¿Buscar Paises donde ha alojado un usuario?</h3>

        <form align="center" action="consultas/consulta_3.php" method="post">
          Username:
          <input type="text" name="username">
          <br/><br/>
          <input type="submit" value="Buscar">
        </form>
      </div>

      <div class="col">

        <h3 align="center"> ¿Buscar dinero gastado en tickets por un id de usuario?</h3>

        <form align="center" action="consultas/consulta_4.php" method="post">
          Id:
          <input type="text" name="uid">
          <br/><br/>
          <input type="submit" value="Buscar">
        </form>

      </div>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
      <div class="col">
        <h3 align="center"> ¿Mostrar Reservas entre 2020-01-01 y 2020-03-31?</h3>

        <form align="center" action="consultas/consulta_5.php" method="post">
          <input type="submit" value="Ejecutar">
        </form>
      </div>

      
      <div class="col">

        <h3 align="center"> ¿Buscar dinero gastado en tickets en un rango de fechas (YYYY-MM-DD)?</h3>

        <form align="center" action="consultas/consulta_6.php" method="post">
          Fecha inicio:
          <input type="text" name="fecha1">
          <br/>
          Fecha fin:
          <input type="text" name="fecha2">
          <br/><br/>
          <input type="submit" value="Buscar">
        </form>

      </div>
    </div>

    
  </div>

</body>
</html>
