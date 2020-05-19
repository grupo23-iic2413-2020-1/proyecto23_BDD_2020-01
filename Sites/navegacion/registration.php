<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 
<body>
  <div class="container">
    <div class="row">
      <div class="col-xl-6 mx-auto">
        <div class="card my-5">
            <br>
            <h3 class="card-title text-center">Registrarse</h3>
          <div class="card-body">
            <form class="form-signin" action="result_registration.php" method="post">
              <div class="form-label-group">
                <label for="inputUserame">Username</label>
                <input type="text" id="inputUserame" class="form-control" placeholder="Username" required autofocus>  
              </div>

              <div class="form-label-group">
                <label for="inputEmail">Correo electónico</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Correo electónico" required>
              </div>

              <div class="form-label-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
              </div>
              
              <div class="form-label-group">
                <label for="inputConfirmPassword">Confirmar contraseña</label>
                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirmar contraseña" required>
              </div>

              <br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrarse</button>
              <a class="d-block text-center mt-2 small" href="/~grupo23/navegacion/log_in.php">Iniciar Sesión</a>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>