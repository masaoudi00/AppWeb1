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
  //abrir sesion
  if(isset($_POST["submit"])){
                 session_start();
                 //al usuario que se ha logeado correctamente
                 $user =$_POST['usuario'];
                 //serializar : enviar la sesion a registrados.php
                 $_SESSION['user']= serialize($user);
  }
  
  ?>

    <div class="container">
    <h1 class="text-center">Loguearse</h1>
        <div class="row d-flex justify-content-center mt-5">
            
                    <form action="comprobar.php" method="post">
                            <div class="form-group">
                              <label for="usuario">Usuario</label>
                              <input type="text" name="usuario" id="usuario" class="form-control" placeholder="usuario" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                              <label for="clave">Contraseña</label>
                              <input type="text" name="clave" id="clave" class="form-control" placeholder="clave" aria-describedby="helpId">
                            </div>

                           <button type="submit" name="submit" class="btn btn-warning">Entrar</button>
                    
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