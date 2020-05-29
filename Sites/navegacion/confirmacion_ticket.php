<?php session_start();
include('../templates/header.html');   
include('../templates/navbar.php');  

require("../config/conexion.php");


$fecha_pasaje = $_GET['fecha'];
$datos = $_POST['pasajes'];
$ciudad_origen = $_GET["ciudad_origen"];
$ciudad_destino = $_GET["ciudad_destino"];
if(isset($datos)){

    if(!empty($datos)) {    
        foreach($datos as $value){
            $did = $value;
        }
    }

  }

$query = "SELECT * FROM Usuarios WHERE Usuarios.uid = ?";


#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result = $db -> prepare($query);
$result -> bindParam(1, $_SESSION['current_uid']);
$result -> execute();
$user = $result -> fetchAll();

$uid = $user[0][0];
$username = $user[0][1];
$unombre = $user[0][2];
$correo = $user[0][3];
$udir = $user[0][4];

$query2 = "SELECT * FROM Destinos WHERE did = $did";
$result_2 = $db -> prepare($query2);
$result_2 -> execute();
$data = $result_2 -> fetchAll();

$cap_max = $data[0][6];

$query3 = "SELECT * FROM asientos($cap_max, $did)";
$result_3 = $db -> prepare($query3);
$result_3 -> execute();
$asientos_disp = $result_3 -> fetchAll();


?> 

<body class= "bg-secondary text-white">
    <div class="container">
        <div class="row justify-content-md-center">
            <h2> Detalles compra: </h2>
        </div>

        <br>
        <div class="row justify-content-md-center">
            <div class='col-md-auto'>
                <div>
                    <h5><b>Fecha viaje: </b> <?php echo $fecha_pasaje ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Ciudad Origen: </b> <?php echo $ciudad_origen ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Ciudad Destino: </b> <?php echo $ciudad_destino ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Hora salida: </b> <?php echo $data[0][3] ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Duracion: </b> <?php echo $data[0][4] ?> hrs</h5>
                    <br>
                </div>
                <div>
                    <h5><b>Medio: </b> <?php echo $data[0][5] ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Usuario: </b> <?php echo $username ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Mail: </b> <?php echo $correo ?> </h5>
                    <br>
                </div>
                <div>
                    <h5><b>Precio: € </b> <?php echo $data[0][7] ?> </h5>
                    <br>
                </div>
                
               

            </div>
            </div>
    </div>
    <form align='center' action='validacion_ticket.php?<?php 
      echo 'fecha='.$fecha_pasaje.'&ciudad_origen='.$ciudad_origen.'&ciudad_destino='.$ciudad_destino.'&did='.$did ?>'  method='post'>
        <div class="card card-body bg-secondary text-white">
            <div class="form-group">      
                <h5><b>Escoger asiento: </b> </h5>
                            
                <select class="form-control form-control-lg" id="sel2" name='asiento' style='width: 5em' >
                <?php
                foreach ($asientos_disp as $asiento) {
                echo "<option>$asiento[0]</option>";
                }
                ?>
                </select>
            </div>
        </div>
             
        <input class='btn btn-primary' align='center' type='submit' value='Validar Compra'>
      </form>

</body>