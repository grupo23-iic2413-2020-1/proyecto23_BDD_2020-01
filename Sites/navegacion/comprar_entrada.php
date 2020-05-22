<?php session_start();
include('../templates/header.html');   
include('../templates/navbar.php');  

require("../config/conexion.php");


$lid = $_GET['lid'];
$lnombre = $_GET['lnombre'];

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

$query2 = "SELECT MAX(eid) FROM Entradas";
$result_2 = $db -> prepare($query2);
$result_2 -> execute();
$max_eid = $result_2 -> fetchAll();

if ($max_eid == NULL) {
        $max_eid = 1;
    } 
else {$max_eid = $max_eid + 1
    }

function GuardarEntrada($max_eid, $uid, $lid) {
    $fecha_compra = date('Y-m-d')
    $query3 = "INSERT INTO Entradas(eid, uid, lid, fecha_compra) 
    VALUES ($max_eid, $uid, $lid, $fecha_compra)";
    $result_3 = $db -> prepare($query3);
    $result_3 -> execute();
    echo '<br>Tu compra ha sido realizada con éxito <br>
    Fecha de Compra: '$fecha_compra
    echo "<form align='center' action='perfil.php' method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Ir al perfil'>
      </form>"
    
      }      

?> 

<body class= "bg-secondary text-white">
    <div class="container">
        <div class="row justify-content-md-center">
            <h2> Detalles compra </h2>
        </div>

        <br>
        <div class="row justify-content-md-center">
            <div class='col-md-auto'>
                <div>
                    <h5><b>Nombre lugar: </b> <?php echo $lnombre ?> </h5>
                </div>
                <div>
                    <h5><b>Usuario: </b> <?php echo $username ?> </h5>
                </div>
                <div>
                    <h5><b>Mail: </b> <?php echo $correo ?> </h5>
                </div>
                <div>
                    <h5><b>Número de Ticket: </b> <?php echo $max_eid ?> </h5>
                </div>

            </div>
            </div>
    </div>
    <form align='center' action="GuardarEntrada($max_eid, $uid, $lid)"  method='post'>
        <input class='btn btn-primary' align='center' type='submit' value='Validar Compra'>
      </form>
</body>


    