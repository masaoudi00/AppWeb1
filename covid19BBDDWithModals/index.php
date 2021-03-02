<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pacientes Covid</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <?php

  require("paciente.php");

  $paciente = new Paciente();

  if (isset($_REQUEST["operacion"])) {
    if ($_REQUEST["operacion"] == "alta") {
      $paciente->alta_paciente($_POST["nombre"], $_POST["direccion"]);
      echo "<h3>Se ha dado de alta  a un nuevo usuario</h3>";
      mostrarListado($paciente->listar_pacientes(), -1);
    } 
    
     if ($_REQUEST["operacion"] == "editar") {
      
      //mostrar formulario de edición
      echo 'id del elemento que quiero modificar:'.$_REQUEST["nume"];
      //$paciente->obtener_paciente_porId($id);
      mostrarListado($paciente->listar_pacientes(), $_REQUEST["nume"]);

      
    }else if($_REQUEST["operacion"]=="borrar"){
      $paciente->borrar_paciente($_REQUEST["nume"]); 
      echo "<h3>Se ha borrado con éxito el paciente con id ".$_REQUEST['nume']."</h3>";
      mostrarListado($paciente->listar_pacientes(), -1);

    } else if ($_REQUEST["operacion"] == "modificar") {
      echo "entra en modificar";
      echo $_POST["nume"] . '-' . $_POST["nombre"] . '-' . $_POST["direccion"];
     
      $paciente->modificar_paciente($_POST["nume"], $_POST["nombre"], $_POST["direccion"]);
      mostrarListado($paciente->listar_pacientes(), -1);
    }
  } else {
    mostrarListado($paciente->listar_pacientes(), -1);
  }

  function mostrarListado($pacientes_array, $elemento){//function mostrarListado

    $html = '<div class="container">
          <h2>Pacientes COVID</h2>          
          <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE PACIENTE</th>
                  <th>DIRECCION</th>
                </tr>
              </thead>
              <tbody>';



    $fila = "";
    foreach ($pacientes_array as $paciente) {
      if ($elemento != $paciente["id"]) {
        $fila = '<tr><td>' . $paciente["id"] . '</td>
                            <td>' . $paciente["nombre"] . '</td>
                            <td>' .  $paciente["direccion"] . '</td>
                            <td>' . '<a href="index.php?operacion=editar&nume=' .  $paciente["id"] . '" class="btn btn-info" role="button">Modificar</a>' . '</td>
                            <td>' . '<a href="index.php?operacion=alta&nume=' .  $paciente["id"] . '" class="btn btn-warning" role="button">Insertar</a>' . '</td>
                            <td>' . '<a href="index.php?operacion=borrar&nume=' .  $paciente["id"] . '" class="btn btn-danger" role="button">Eliminar</a>' . '</td></tr>';
      } else {
          $fila = '<tr><form method="POST" class="form-inline" action="index.php?operacion=modificar"><td>' . $paciente["id"]. '</td>
                <td><input type="text" class="form-control" id="nombre" value=' . $paciente["nombre"] .' name="nombre"></td>
                <td><input type="text" class="form-control" id="direccion" value=' . $paciente["direccion"] .' name="direccion"></td>
                <td>'.'<input type="submit" class="btn btn-success" value="Grabar" />' . '</td>
                <td>' . '<a href="index.php" class="btn btn-danger" role="button">Cancelar</a>' . '</td>
                <input type="hidden" name="nume" value="' . $elemento . '" />
                </form>
                </tr>';
               

        }

      $html = $html . $fila;
    } //fin del bucle for

    $html = $html . '</tbody></table></div>';
    echo $html;
  }//function mostrarListado terminada


  ?>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal"  data-target="#modalInsertar">
  AgregarPacienteModal
</button>


      <!-- Modal -->
      <form id="guardarDatos">
<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Insertar Datos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
        <div id="datos_ajax_register"></div>
          <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" name="nombre" id="nombre" autofocus required class="form-control" placeholder="nombre" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Direccion</label>
              <input type="text" name="direccion" id="direccion" required class="form-control" placeholder="direccion" aria-describedby="helpId">
            </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    
    </div>
  </div>
</div>
</form>




<!--
  <div class="container">
    <form method="POST" class="form-inline" action="index.php?operacion=alta">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" placeholder="Introduzca el nombre" name="nombre">
      </div>
      <div class="form-group">
        <label for="direccion">Dirección:</label>
        <input type="text" class="form-control" id="direccion" placeholder="dirección" name="direccion">
      </div>
      <button type="submit" class="btn btn-default">Grabar</button>

    </form>
  </div>-->
</body>
</html>