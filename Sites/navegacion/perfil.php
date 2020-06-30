<?php session_start();
ob_start();
include('../templates/header.html');   
include('../templates/navbar.php');  

require("../config/conexion.php");

if ($_SESSION['loggedin'] == False) {
    header("location: ../errores/perfil1.php");
    exit;} 

if (isset($_POST['devolver_ticket'])) {
    $query_a = "DELETE FROM Tickets WHERE Tickets.tid = ?";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_a = $db -> prepare($query_a);
    $result_a -> bindParam(1, $_POST['tid']);
    $result_a -> execute();
    
} elseif (isset($_POST['devolver_entrada'])) {
    $query_b = "DELETE FROM Entradas WHERE Entradas.eid = ?";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_b = $db -> prepare($query_b);
    $result_b -> bindParam(1, $_POST['eid']);
    $result_b -> execute();

} elseif (isset($_POST['cancelar_reserva'])) {
    $query_c = "DELETE FROM Reservas WHERE Reservas.rid = ?";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result_c = $db -> prepare($query_c);
    $result_c -> bindParam(1, $_POST['rid']);
    $result_c -> execute();
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

$query_2 = "SELECT t2.fecha_compra, t1.lnombre, t1.hora_apertura, t1.hora_cierre, t2.eid FROM 
            dblink('dbname=grupo50e3 host=localhost port=5432 user=grupo50 password=grupo2350',
            'SELECT m.lid, l.lnombre, m.hora_apertura, m.hora_cierre FROM Museo AS m, Lugar AS l WHERE m.lid = l.lid')
            AS t1(lid INT, lnombre VARCHAR(255), hora_apertura TIME, hora_cierre TIME), Entradas AS t2
            WHERE t2.uid = $uid AND t1.lid = t2.lid";


#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result_2 = $db -> prepare($query_2);
$result_2 -> execute();
$entradas = $result_2 -> fetchAll();




$query_4 = "Select Reservas.fechai, Reservas.fechat, Hoteles.hnombre, Hoteles.hdir, Reservas.rid
            from Hoteles, Reservas
            where reservas.uid = $uid 
            and reservas.hid = hoteles.hid;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result_4 = $db -> prepare($query_4);
$result_4 -> execute();
$reservas = $result_4 -> fetchAll();

$query_5 = "select asiento, fechac, fechav, c1.cnombre, c2.cnombre, tickets.tid, destinos.salida
            from tickets, destinos, ciudades as c1, ciudades as c2
            where uid = $uid
            and tickets.did = destinos.did 
            and destinos.cid1 = c1.cid 
            and destinos.cid2 = c2.cid;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result_5 = $db -> prepare($query_5);
$result_5 -> execute();
$tickets = $result_5 -> fetchAll();

#Se construye la consulta como un string
$query_6 = "SELECT SUM(Destinos.precio) FROM Usuarios, Tickets, Destinos
WHERE Usuarios.uid = ?
AND Usuarios.uid = Tickets.uid
AND Tickets.fechac <= CURRENT_TIMESTAMP
AND Tickets.did = Destinos.did;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result_6 = $db -> prepare($query_6);
$result_6 -> bindParam(1, $uid);
$result_6 -> execute();
$dinero_tickets = $result_6 -> fetchAll();


#Se construye la consulta como un string
$query_7 = "SELECT precio, fechai, fechat FROM Reservas, Hoteles WHERE Reservas.uid = ? AND Reservas.hid = Hoteles.hid";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result_7 = $db -> prepare($query_7);
$result_7 -> bindParam(1, $uid);
$result_7 -> execute();
$dinero_hoteles = $result_7 -> fetchAll();

$query_8 = "SELECT Lugar.precio FROM
dblink('dbname=grupo50e3 host=146.155.13.72 port=5432 user=grupo50 password=grupo2350', 'SELECT lid, precio FROM Museo') 
AS Lugar(lid integer, precio integer), Entradas WHERE Entradas.uid = ? AND Entradas.lid = Lugar.lid";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result_8 = $db -> prepare($query_8);
$result_8 -> bindParam(1, $uid);
$result_8 -> execute();
$dinero_entradas = $result_8 -> fetchAll();



?> 



<body class= "bg-secondary text-white">
    </div>
    <div class="container">
            <br>
            <div class="row justify-content-md-center">
                <h2> Perfil de <?php echo $username;?> </h2>
            </div>
            <br>
            <br>

            <div class="container"> 
                <table class="table table-bordered bg-white table-borderless ">
                    <tbody>
                    <tr>
                        <td><b>Nombre: </b></td>
                        <td><?php echo $unombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Mail: </b></td>
                        <td><?php echo $correo ?></td>
                    </tr>
                    <tr>
                        <td><b>Dirección: </b></td>
                        <td><?php echo $udir ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <br>

<!--- BEGIN TABS --->
<div class='card bg-secondary'>
<!-- Nav pills -->
<ul class="nav nav-pills nav-justified">
  <li class="nav-item">
    <a class="nav-link active btn btn-outline-success text-white" data-toggle="pill" href="#tickets"><h4>Tickets</h4></a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-outline-success text-white" data-toggle="pill" href="#entradas"><h4>Entradas</h4></a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-outline-success text-white" data-toggle="pill" href="#reservas"><h4>Reservas</h4></a>
  </li>
  <li class="nav-item">
    <a class="nav-link btn btn-outline-success text-white" data-toggle="pill" href="#dinero"><h4>Dinero Gastado</h4></a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="tickets">
        <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

            <thead class="thead-dark">
            <tr style="text-align:center">
                <th>Asiento</th>
                <th>Fecha compra</th>
                <th>Fecha viaje</th>
                <th>Hora Salida</th>
                <th>Ciudad origen</th>
                <th>Ciudad destino</th>
                <th>Devolver ticket</th>

            </tr>
            </thead>
            <tbody>

            <?php
                foreach ($tickets as $tik) {
                echo "<tr> <td>$tik[0]</td> <td>".date('Y-m-d', strtotime($tik[1]))."</td> 
                <td>".date('Y-m-d', strtotime($tik[2]))."</td> <td>$tik[6]</td> <td>$tik[3]</td> <td>$tik[4]</td>
                <td>";
                if (date("Y-m-d") < date('Y-m-d', strtotime($tik[2]))) {
                echo "<form align='center' action='perfil.php'  method='post'>
                    <input type='hidden' name='tid' value=$tik[5]>
                    <input class='btn btn-danger' align='center' type='submit' value='Devolver' name='devolver_ticket' style='font-size: 17px'>";}
                else {
                    echo " No habilitado ";
                }
                echo "</form>
                </td></tr>";
            }
            ?>
            </tbody>

        </table>
  </div>
  <div class="tab-pane container fade" id="entradas">
        <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

        <thead class="thead-dark">
                <tr style="text-align:center">
                    <th>Fecha Compra</th>
                    <th>Nombre Museo</th>
                    <th>Hora Apertura</th>
                    <th>Hora Cierre</th>
                    <th>Devolver entrada</th>

                </tr>
                </thead>
                <tbody>

                <?php
                    foreach ($entradas as $entr) {
                    echo "<tr> <td>$entr[0]</td> <td>$entr[1]</td> <td>$entr[2]</td> <td>$entr[3]</td>
                        <td>
                        <form align='center' action='perfil.php'  method='post'>
                            <input type='hidden' name='eid' value=$entr[4]>
                            <input class='btn btn-danger' align='center' type='submit' value='Devolver' name='devolver_entrada' style='font-size: 17px'>
                        </form>
                        </td></tr>";
                }
                ?>
                </tbody>

            </table>
  </div>
  <div class="tab-pane container fade" id="reservas">
    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

        <thead class="thead-dark">
        <tr style="text-align:center">
            <th>Fecha Inicio</th>
            <th>Fecha Termino</th>
            <th>Nombre Hotel</th>
            <th>Dirección Hotel</th>
            <th>Cancelar reserva</th>

        </tr>
        </thead>
        <tbody>

        <?php
            foreach ($reservas as $res) {
            echo "<tr> <td>$res[0]</td> <td>$res[1]</td> <td>$res[2]</td> <td>$res[3]</td>
                <td>";
            if (date("Y-m-d") < $res[0]) { 
                echo "<form align='center' action='perfil.php'  method='post'>
                    <input type='hidden' name='rid' value=$res[4]>
                    <input class='btn btn-danger' align='center' type='submit' value='Cancelar' name='cancelar_reserva' style='font-size: 17px'>";}
            else {
            echo "No habilitado";
            }
            echo "</form>
                    </td></tr>";
        }
        ?>
        </tbody>

    </table>
  </div>
  <div class="tab-pane container fade" id="dinero">
        <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

            <thead class="thead-dark">
            <tr style="text-align:center">
                <th>Tickets</th>
                <th>Entradas</th>
                <th>Reservas</th>
                <th>Total</th>

            </tr>
            </thead>
            <tbody>

            <?php
            $tickets_total = 0;
            foreach ($dinero_tickets as $d) {
                $tickets_total = $tickets_total + $d[0];

            }

            $dinero_total_hoteles = 0;
            foreach ($dinero_hoteles as $htl){
                $precio_unidad = $htl[0];
                $fecha_inicio = new DateTime($htl[1]);
                $fecha_termino = new DateTime($htl[2]);
                $diff_dias = $fecha_inicio->diff($fecha_termino);
                $precio_agregar = ($diff_dias->days * $precio_unidad);
                $dinero_total_hoteles = $dinero_total_hoteles + $precio_agregar;
            }
            $dinero_total_entradas = 0;
            foreach ($dinero_entradas as $ent){
                $dinero_total_entradas = $dinero_total_entradas + $ent[0];
            }

            $total_gastado = $dinero_total_hoteles + $tickets_total + $dinero_total_entradas;
            echo "<tr>  <td>€ $tickets_total</td>
                        <td>€ $dinero_total_entradas</td>
                        <td>€ $dinero_total_hoteles</td>
                        <td>€ $total_gastado</td></tr>";
            ?>
            </tbody>
            
        </table>
  </div>
</div>

<!--- END TABS --->
</div>
<br>
<br>
<div class="container">
    <div>
        <a  role='button' class="btn btn-dark" href='log_out.php'> Cerrar sesión </a>
    </div>
    <br>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
        Eliminar Cuenta
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="deleteModalLabel">¿Estas seguro de eliminar este usuario?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark">
                    <p>Una vez que elimines a este usuario no podrás volver a ingresar a esta cuenta.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a role="button" href='../navegacion/delete_user.php' class="btn btn-danger" >Eliminar</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
<br>
<br>
</body>

<?php ob_end_flush(); ?>