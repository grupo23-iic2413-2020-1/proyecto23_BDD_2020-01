<?php session_start();
include('../templates/header.html');
include('../templates/navbar.php');  
require("../config/conexion.php");  ?>
<body class= "bg-secondary text-white">
    <div class='row'>
      <div class='col-xs'>
        <?php include('../templates/vertical_navbar.php');  ?>
      </div>
      
      <div class="container">
            <div class='col-no-gutters'>
                <h1 class= "text-white" style="text-align: center; margin-top: 1rem"> Elección fechas a filtrar para mapa </h1>
                <br>
                <form align="center" action="mapa.php" method="post">
                   
                        <label for="birthdaytime"> Fecha inicio: </label>
                        <div align='center' >
                            <input style="width: 10em; height: 1em; font-size: 25px; color: black; align: center" type="date" name='fechai'>
                        </div>
                        <br>
                        <label for="birthdaytime"> Fecha término: </label>
                        <div align='center' >
                            <input style="width: 10em; height: 1em; font-size: 25px; color: black; align: center" type="date" name='fechat'>
                        </div>
                        <br>
                        <div align='center' >
                            <input class="btn btn-primary" align="center" type="submit" value="Crear Mapa" name='Buscar'>
                        </div>
       
                </form>
            </div>
        </div>
    </div>
</body>