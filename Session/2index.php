<?php include './includes/header.php';
session_start(); 

global $user;
$user = $_SESSION['usuario'];


?>

<div class="align-right">
    <span>Welcome usuari@: <?php  echo  $user; ?></span><a href="login.php?cerrar=1" class="btn btn-warning" name="salir">Salir</a>
</div>



<?php include './includes/footer.php'; ?>
