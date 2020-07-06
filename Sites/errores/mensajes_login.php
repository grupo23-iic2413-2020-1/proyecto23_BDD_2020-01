<?php session_start();
include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 
<body class= "bg-secondary text-white">
    <div class="container">
        <div class="row justify-content-md-center">
            <h2> Debes registrarte para acceder a la mensajería</h2>
        </div>
        <form action="../navegacion/log_in.php" method="get">
      <input class="btn btn-success btn lg" type="submit" value="Registrarse">
    </form>
    </div>
</body>
<?php include('../templates/footer.html');   ?>