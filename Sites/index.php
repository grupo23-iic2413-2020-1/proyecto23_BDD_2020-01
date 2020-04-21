<?php include('templates/header.html');   ?>

<body class= "bg-secondary text-white">
  <div class="container">
    <br>
    <h1 class= "text-white" align="center">Entrega 2 BDD Grupo 32 </h1>
    <br>
    <h3 class= "text-white" align="center">Splinter S.A.</h3>
    <br>
    <p class= "text-white" align="right">En esta página podrás realizar múltiples consultas a la bases de datos de Splinter S.A.</p>
    <br>
    <p class= "text-white" align="right">Estas corresponden a:</p>
    <br>
    <p class= "text-white" align="right">  Consulta 1: Muestra todos los username junto a su correo.</p>
    <p class= "text-white" align="right">  Consulta_2: Ingrese el nombre de un país y se mostraráne todos los nombres de las ciudades de ese país.</p>
    <p class= "text-white" align="right">  Consulta 3: Ingrese un username y se mostrarán todos los nombres distintos de países en los que ha
      hospedado el usuario con ese username mediante hoteles de la agencia.</p>
    <p class= "text-white" align="right">  Consulta 4: Ingrese el identificador de un usuario y se mostrará la cantidad de dinero que ha gastado el
      usuario con ese identificador en todos los tickets que ha comprado.</p>
      <p class= "text-white" align="right">  Consulta 5: Se muestra el identificador y nombre de usuario junto a la fecha de inicio en formato
      YYYY-MM-DD, la fecha de término y el nombre del hotel de las reservas que parten desde
      el 01 de enero del 2020 y terminan antes del 31 de marzo del 2020, ambas fechas
      inclusive.</p>
    <p class= "text-white" align="right">  Consulta 6: Ingrese dos fechas en formato YYYY-MM-DD: una de inicio y una de fin y se mostrarán el id,
      nombre de usuario y el total de dinero gastado en tickets entre esas dos fechas, ambas
      inclusive.</p>
    <br>
    <p class= "text-white" align="right">A continuación deberás presionar el botón correspondiente a la consulta que quieres realizar.</p>

    <br>
    <br>
    

    <div class="row">
      <div class="col">
        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC1" aria-expanded="false" aria-controls="collapseC1">
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
              <input type="submit" value="Buscar">
            </form>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col">
        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC3" aria-expanded="false" aria-controls="collapseC3">
        Consulta 3
        </button>

        <div class="collapse" id="collapseC3">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Buscar Paises donde ha alojado un usuario?</h3>

            <form align="center" action="consultas/consulta_3.php" method="post">
              Username:
              <input class="w-25" type="text" name="username">
              <br/><br/>
              <input type="submit" value="Buscar">
            </form>
          </div>
        </div>
        
      </div>

      <div class="col">

        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC4" aria-expanded="false" aria-controls="collapseC4">
        Consulta 4
        </button>

        <div class="collapse" id="collapseC4">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Buscar dinero gastado en tickets por un id de usuario?</h3>

          <form align="center" action="consultas/consulta_4.php" method="post">
            Id:
            <input class="w-25" type="text" name="uid">
            <br/><br/>
            <input type="submit" value="Buscar">
          </form>
          </div>
        </div>



      </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col">

        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC5" aria-expanded="false" aria-controls="collapseC5">
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

        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC6" aria-expanded="false" aria-controls="collapseC6">
        Consulta 6
        </button>

        <div class="collapse" id="collapseC6">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Buscar dinero gastado en tickets en un rango de fechas (YYYY-MM-DD)?</h3>

            <form align="center" action="consultas/consulta_6.php" method="post">
              Fecha inicio:
              <input class="w-25" type="text" name="fecha1">
              <br/>
              Fecha fin:
              <input class="w-25" type="text" name="fecha2">
              <br/><br/>
              <input type="submit" value="Buscar">
            </form>            
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
</body>
</html>
