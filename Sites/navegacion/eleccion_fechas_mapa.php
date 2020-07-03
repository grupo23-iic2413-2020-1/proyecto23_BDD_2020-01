<?php session_start();
include('../templates/header.html');
include('../templates/navbar.php');  
require("../config/conexion.php");  ?>
<div class="container" >
<body class= "bg-secondary text-white">
    <h1 class= "text-white" style="text-align: center; margin-top: 1rem"> Elección fechas a filtrar para mapa </h1>
    <form align="center" action="mapa.php" method="post">
        <div class="card card-body bg-secondary text-white">
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
                <input class="btn btn-primary" align="center" type="submit" value="Crear Itinerario" name='Buscar'>
            </div>
        </div>
    </form>
</div>