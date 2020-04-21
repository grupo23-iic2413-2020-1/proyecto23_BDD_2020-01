<?php include('templates/header.html');   ?>

<body class= "bg-secondary text-white">
  <div class="container">
    <br>
    <h1 class= "text-white" align="center">Entrega 2 BDD </h1>

    <br>
    <br>
    <br>
    

    <div class="row">
      <div class="col">
        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseC1" aria-expanded="false" aria-controls="collapseC1">
        Consulta 1
        </button>

        <div class="collapse" id="collapseC1">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Mostrar Usuarios y Correos?</h3>

            <form align="center" action="consultas/consulta_1.php" method="post">
              <input type="submit" value="Ejecutar">
            </form>
          </div>
        </div>
      </div>
      <div class="col">

      <button class="btn btn-success btn lg" type="button" data-toggle="collapse" data-target="#collapseC2" aria-expanded="false" aria-controls="collapseC2">
        Consulta 2
        </button>

        <div class="collapse" id="collapseC2">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Buscar ciudades de un país?</h3>

            <form align="center" action="consultas/consulta_2.php" method="post">
              Pais:
              <input type="text" name="pnombre">
              <br/><br/>
              <input type="submit" value="Buscar">
            </form>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
      <div class="col">
        <button class="btn btn-success btn lg" type="button" data-toggle="collapse" data-target="#collapseC3" aria-expanded="false" aria-controls="collapseC3">
        Consulta 3
        </button>

        <div class="collapse" id="collapseC3">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Buscar Paises donde ha alojado un usuario?</h3>

            <form align="center" action="consultas/consulta_3.php" method="post">
              Username:
              <input type="text" name="username">
              <br/><br/>
              <input type="submit" value="Buscar">
            </form>
          </div>
        </div>
        
      </div>

      <div class="col">

        <button class="btn btn-success btn lg" type="button" data-toggle="collapse" data-target="#collapseC4" aria-expanded="false" aria-controls="collapseC4">
        Consulta 4
        </button>

        <div class="collapse" id="collapseC4">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Buscar dinero gastado en tickets por un id de usuario?</h3>

          <form align="center" action="consultas/consulta_4.php" method="post">
            Id:
            <input type="text" name="uid">
            <br/><br/>
            <input type="submit" value="Buscar">
          </form>
          </div>
        </div>



      </div>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
      <div class="col">

        <button class="btn btn-success btn lg" type="button" data-toggle="collapse" data-target="#collapseC5" aria-expanded="false" aria-controls="collapseC5">
        Consulta 5
        </button>

        <div class="collapse" id="collapseC5">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Mostrar Reservas entre 2020-01-01 y 2020-03-31?</h3>

            <form align="center" action="consultas/consulta_5.php" method="post">
              <input type="submit" value="Ejecutar">
            </form>
          </div>            
        </div>
      </div>
      
      <div class="col">

        <button class="btn btn-success btn lg" type="button" data-toggle="collapse" data-target="#collapseC6" aria-expanded="false" aria-controls="collapseC6">
        Consulta 6
        </button>

        <div class="collapse" id="collapseC6">
          <div class="card card-body bg-secondary text-white">
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
    </div>

    
  </div>

</body>
</html>
