<?php session_start();
include('../templates/header.html');
include('../templates/navbar.php');  
require("../config/conexion.php"); 

$url = "https://nameless-meadow-87804.herokuapp.com/messages";
$json = file_get_contents($url);
$json_data = json_decode($json, true);?>
<body class= "bg-secondary text-white">

  <div class="container-lg">
      <div class="table-responsive">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
                      <div class="col-sm-4">
                          <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                      </div>
                  </div>
              </div>
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Department</th>
                          <th>Phone</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Administration</td>
                        <td>(171) 555-2222</td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Peter Parker</td>
                        <td>Customer Service</td>
                        <td>(313) 555-5735</td>
                        <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Fran Wilson</td>
                        <td>Human Resources</td>
                        <td>(503) 555-9931</td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>      
  
                  </tbody>
            </table>
        </div>
    </div>
</div>    


  <div class='row'>
    <div class='col-xs'>
      <?php include('../templates/vertical_navbar.php');  ?>
    </div>
    <div class="container">
      <div class='col-no-gutters'>
        <h1 class= "text-white" style="text-align: center; margin-top: 1rem">Buscar Mensajes</h1>
        <h2 class= "text-white" style="text-align: center; margin-top: 1rem">Ingrese las características del mensaje</h2>

        <form align="center" action="resultados_text_search.php" method="post">
        Requerido:
        <input class="w-25" type="text" name="required" style="width: 25em; height: 2em;">
        <br/><br/>
        Deseado:
        <input class="w-25" type="text" name="desired" style="width: 25em; height: 2em;">
        <br/><br/>
        Prohibido:
        <input class="w-25" type="text" name="forbidden" style="width: 25em; height: 2em;">
        <br/><br/>
        Id de emisor:
        <input class="w-25" type="text" name="uid_emisor" style="width: 25em; height: 2em;">
        <br/><br/>
        <input class="btn btn-primary" type="submit" value="Buscar">
        <?php include('../templates/footer.html'); ?>
      </div>
    </div>
  </div>
</body>
