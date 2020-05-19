<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.php');   ?> 
<body>
  <div class="container">
    <div class="row">
      <div class="col-xl-6 mx-auto">
        <div class="card my-5">
            <br>
            <h3 class="card-title text-center">Iniciar Sesión</h3>
          <div class="card-body">
            <form class="form-login" action="result_log_in.php" method="post">
              <div class="form-label-group">
                <label for="inputUserame">Username</label>
                <input type="text" name='username' id="inputUserame" class="form-control" placeholder="Username"  required autofocus>  
              </div>
              <div class="form-label-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Contraseña" required>
              </div>
              <br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Ingresar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>