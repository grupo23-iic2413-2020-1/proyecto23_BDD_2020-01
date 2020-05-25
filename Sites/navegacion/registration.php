<?php session_start(); ?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 
<body>
  <div class="container">
    <div class="row">
      <div class="col-xl-6 mx-auto">
        <div class="card my-3">
            <br>
            <h3 class="card-title text-center">Registrarse</h3>
          <div class="card-body">
            <form class="form-signin" action="result_registration.php" method="post">
              <div class="form-label-group">
                <label for="inputUserame">Username</label>
                <input type="text" name='username' id="inputUserame" class="form-control" placeholder="Username" required autofocus>  
                <br>
              </div>

              <div class="form-label-group">
                <label for="inputEmail">Correo electónico</label>
                <input type="email" name='email' id="inputEmail" class="form-control" placeholder="Correo electrónico" required>
                <br>
              </div>

              <div class="form-label-group">
                <label for="inputName">Nombre Completo</label>
                <input type="text" name='unombre' id="inputName" class="form-control" placeholder="Nombre Completo" required>
                <br>
              </div>

              <div class="form-label-group">
                <label for="inputDir">Dirección</label>
                <input type="text" name='udir' id="inputDir" class="form-control" placeholder="Dirección" required>
                <br>
              </div>

              <div class="form-label-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Contraseña" required>
                <br>
              </div>
              
              <div class="form-label-group">
                <label for="inputConfirmPassword">Confirmar contraseña</label>
                <input type="password" name='password_confirm' id="inputConfirmPassword" class="form-control" placeholder="Confirmar contraseña" required>
                <br>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrarse</button>
              <a class="d-block text-center mt-2 small" href="../navegacion/log_in.php">Iniciar Sesión</a>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>