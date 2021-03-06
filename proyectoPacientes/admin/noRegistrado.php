<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
        require "../conexion.php";
        if(isset($_POST['usuario']) && ($_POST['clave'])){
            $usuario= $_POST['usuario'];
            $clave = $_POST['clave'];
        
            $cadenaSql="insert into users values(:user,:pwd)";
            $consulta=$connection->prepare($cadenaSql);
            
            
             //ASIGNAR VALORES A LOS PARÁMETROS
             $consulta->bindParam(':user',$usuario);
             $consulta->bindParam(':pwd',$clave);
             //ver si hay fallo
             if(!$consulta){
                     echo "Error en la consulta Sql".$cadenaSql;
                     die();
             }
             
             //ejecutar la consulta
             $consulta->execute();
        }

  ?>

<div class="container">
    <h1 class="text-center">Registro</h1>
        <div class="row d-flex justify-content-center mt-5">

            <form action="noRegistrado.php" method="post">
                    <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="usuario" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="text" name="clave" id="clave" class="form-control" placeholder="clave" aria-describedby="helpId">
                    </div>

                <button type="submit" class="btn btn-warning">Entrar</button>
                <a href="index.php" class="btn btn-info">Volver</a>

            </form>
    </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>