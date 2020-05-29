<?php session_start();
include('templates/header.html');  
include('templates/navbar.php');   ?> 


<body class= "bg-secondary text-white">
  <div class="container">
    
    <br>
    <h1 class= "text-white" align="center">Consultas Splinter S.A.</h1>
    <br>
    <p class= "text-white" align="left">En esta página podrás realizar múltiples consultas a la bases de datos de Splinter S.A., las cuales se encontrarán epxplicadas al final de esta página</p>
    <p class= "text-white" align="left">A continuación deberás presionar el botón correspondiente a la consulta que quieres realizar.</p>
    
    

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
              <input class="btn btn-primary" type="submit" value="Buscar">
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
            <input class="btn btn-primary" type="submit" value="Buscar">
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
              <input class="btn btn-primary" type="submit" value="Ejecutar">
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
              <input class="btn btn-primary" type="submit" value="Buscar">
            </form>            
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col">
        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC7" aria-expanded="false" aria-controls="collapseC7">
        Consulta 7
        </button>

        <div class="collapse" id="collapseC7">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> ¿Quieres saber todos los nombres distintos de las obras de arte?</h3>

            <form align="center" action="consultas/consulta_7.php" method="post">
              <input class="btn btn-primary" type="submit" value="Buscar">
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
            <h3 align="center">Ingresa un artista y conoce las plazas donde tiene esculturas propias</h3>

            <form align="center" action="consultas/consulta_8.php" method="post">
              Nombre artista:
              <input class="w-25" type="text" name="nombre_artista">
              <br/><br/>
              <input class="btn btn-primary" type="submit" value="Buscar">
            </form>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col">
        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC9" aria-expanded="false" aria-controls="collapseC7">
        Consulta 9
        </button>

        <div class="collapse" id="collapseC9">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> Ingresa un pais y conoce los museos con obras de renacimiento</h3>

            <form align="center" action="consultas/consulta_9.php" method="post">
              Nombre Pais:
              <input class="w-25" type="text" name="nombre_pais">
              <br/><br/>
              <input class="btn btn-primary" type="submit" value="Buscar">
            </form>
          </div>
        </div>
      </div>
      <div class="col">

        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC10" aria-expanded="false" aria-controls="collapseC8">
        Consulta 10
        </button>

        <div class="collapse" id="collapseC10">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> Conocer cantidad de obras realizadas por artista</h3>

            <form align="center" action="consultas/consulta_10.php" method="post">
              <input class="btn btn-primary" type="submit" value="Buscar">
            </form>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col">
        <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC11" aria-expanded="false" aria-controls="collapseC7">
        Consulta 11
        </button>

        <div class="collapse" id="collapseC11">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> Ingresa hora llegada, hora salida y ciudad</h3>

            <form align="center" action="consultas/consulta_11.php" method="post">
            Hora llegada:
            <input class="w-25" type="text" name="hora_llegada">
            <br/><br/>
            Hora salida:
            <input class="w-25" type="text" name="hora_salida">
            <br/><br/>
            Nombre ciudad:
            <input class="w-25" type="text" name="nombre_ciudad">
            <br/><br/>
              <input class="btn btn-primary" type="submit" value="Buscar">
            </form>
          </div>
        </div>
      </div>
      <div class="col">

      <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapseC12" aria-expanded="false" aria-controls="collapseC8">
        Consulta 12
        </button>

        <div class="collapse" id="collapseC12">
          <div class="card card-body bg-secondary text-white">
            <h3 align="center"> Conocer los lugares que contengan obras de todos los periodos</h3>

            <form align="center" action="consultas/consulta_12.php" method="post">
              <input class="btn btn-primary" type="submit" value="Buscar">
            </form>
          </div>
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
    <p class= "text-white" align="left">  Consulta 7: Muestra el nombre de todas las obras</p>
    <p class= "text-white" align="left">  Consulta 8: Muestre todos los museos que tengan obras del renacimiento</p>
    <p class= "text-white" align="left">  Consulta 9: Ingrese el nombre de un país. Muestre el nombre de todos los museos de ese país que tengan obras del renacimiento</p>
    <p class= "text-white" align="left">  Consulta 10: Para cada artista, entregue su nombre y el número de obras en las que ha participado</p>
    <p class= "text-white" align="left">  Consulta 11: Ingrese una hora de apertura en formato hh:mm:ss, una hora de cierre y una ciudad.
      Muestre los nombres de las iglesias ubicadas en esa ciudad, abiertas entre esas horas
      (inclusive) junto a todos los nombres de los frescos que encuentra en cada una de ellas.
      Una fila por cada tupla.</p>
    <p class= "text-white" align="left">  Consulta 12: Encuentre el nombre de cada museo, plaza o iglesia que tenga obras de todos los
      periodos del arte que existan en la base de datos.</p>
  </div>
  <br>
  <br>
</body>
</html>

