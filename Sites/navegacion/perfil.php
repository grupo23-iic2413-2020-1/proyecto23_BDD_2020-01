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

$query_5 = "select asiento, fechac, fechav, c1.cnombre, c2.cnombre, tickets.tid
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


?> 

<body class= "bg-secondary text-white">

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
                <br>
                <br>
                <br>
                <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tickets" aria-expanded="false" aria-controls="collapseExample">
                    Ver tickets
                </button>
                </p>
                <div class="collapse" id="tickets">
                <div class="card card-body">
                    <table class="table table-bordered table-hover bg-white" style="align-self:center;width:90%;margin: 0 auto;">

                        <thead class="thead-dark">
                        <tr style="text-align:center">
                            <th>Asiento</th>
                            <th>Fecha compra</th>
                            <th>Fecha viaje</th>
                            <th>Ciudad origen</th>
                            <th>Ciudad destino</th>
                            <th>Devolver ticket</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            foreach ($tickets as $tik) {
                            echo "<tr> <td>$tik[0]</td> <td>".date('Y-m-d', strtotime($tik[1]))."</td> 
                            <td>".date('Y-m-d', strtotime($tik[2]))."</td> <td>$tik[3]</td> <td>$tik[4]</td>
                            <td>
                            <form align='center' action='perfil.php'  method='post'>
                                <input type='hidden' name='tid' value=$tik[5]>
                                <input class='btn btn-danger' align='center' type='submit' value='Devolver' name='devolver_ticket' style='font-size: 17px'>
                            </form>
                            </td></tr>";
                        }
                        ?>
                        </tbody>

                        </table>
                </div>
                </div>

                <br>
                
                <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#entradas" aria-expanded="false" aria-controls="collapseExample">
                Ver Entradas
                </button>
                </p>
                <div class="collapse" id="entradas">
                <div class="card card-body">
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
                </div>

                <br>
                

                <div>     
                <div>
                <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#reservas" aria-expanded="false" aria-controls="collapseExample">
                    Ver reservas
                </button>
                </p>
                <div class="collapse" id="reservas">
                <div class="card card-body">
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
                                echo "<tr> <td>$res[0]</td> <td>$res[1]</td> <td>$res[2]</td> <td>$res[3]<</td>
                                    <td>
                                    <form align='center' action='perfil.php'  method='post'>
                                        <input type='hidden' name='rid' value=$res[4]>
                                        <input class='btn btn-danger' align='center' type='submit' value='Cancelar' name='cancelar_reserva' style='font-size: 17px'>
                                    </form>
                                    </td></tr>";
                            }
                            ?>
                            </tbody>
                            
                        </table>
                    </div>
                    </div>
                </div>
                <br>
                <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#dinero" aria-expanded="false" aria-controls="collapseExample">
                    Dinero gastado
                </button>
                </p>
                <div class="collapse" id="dinero">
                <div class="card card-body">
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
                            foreach ($dinero_tickets as $d) {
                                echo "<tr> <td>$d[0]</td> <td>$d[0]</td> <td>$d[0]</td> <td>$d[0]</td></tr>";
                            }
                            ?>
                            </tbody>
                            
                        </table>
                    </div>
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
            </div>
            </div>
    </div>

</body>

<?php ob_end_flush(); ?>