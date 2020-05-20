<?php session_start();
include('../templates/header.html');   
include('../templates/navbar.php');  

require("../config/conexion.php");

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

?> 

<body class= "bg-secondary text-white">
    <div class="container">
        <div class="row justify-content-md-center">
            <h2> Perfil de <?php echo $username;?> </h2>
        </div>

        <br>
        <div class="row justify-content-md-center">
            <div class='col-md-auto'>
                <div>
                    <h5><b>Nombre: </b> <?php echo $unombre ?> </h5>
                </div>
                <div>
                    <h5><b>Mail: </b> <?php echo $correo ?> </h5>
                </div>
                <div>
                    <h5><b>Dirección: </b> <?php echo $udir ?> </h5>
                </div>
                <br>
                <br>
                <br>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">
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
                            <a role="button" href='/~grupo23/navegacion/delete_user.php' class="btn btn-primary" >Eliminar</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
</body>