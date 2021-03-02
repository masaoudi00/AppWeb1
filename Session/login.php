<?php include './includes/header.php'; ?>


<div class="container d-flex justify-content-center">
    <form action="login.php" method="GET">
            <div class="form-group">
              <label for="">usuario</label>
              <input type="text" name="usuario" id="usuario" class="form-control" placeholder="usuario" aria-describedby="helpId">
            </div>
            <div class="form-group">
            <label for="">Contraseña</label>
            <input type="password" name="clave" id="clave" class="form-control" placeholder="clave" aria-describedby="helpId">
          </div>
        <input type="submit" value="Entrar" name="entrar" class="btn btn-info">
    </form>
</div>
<?php 

session_start();

if(isset($_GET['entrar'])){
    $usuario=$_GET['usuario'];
    $_SESSION['usuario']=$usuario;
    header('Location: 2index.php');
}

if(isset($_GET['cerrar'])){
    unset($_SESSION['usuario']);
    session_destroy();
    header('Location: login.php');
}


?>


<?php include './includes/footer.php';?>
