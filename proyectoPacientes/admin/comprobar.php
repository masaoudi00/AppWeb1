<?php

require "../conexion.php";
session_start();

$_SESSION = $_POST["usuario"];

$usuario= $_SESSION;
echo 'Welcome '.$usuario;

if(isset($_POST['usuario']) && ($_POST['clave'])){
    $usuario= $_POST['usuario'];
    $clave = $_POST['clave'];

    $cadenaSql="select * from users where usuario=:user and clave=:pwd";
                                
    $consulta=$connection->prepare($cadenaSql);
    
    $consulta->bindParam(":user",$usuario);
    $consulta->bindParam(":pwd",$clave);
      //ejecutar la consulta
    $consulta->execute();
    $numRegistros=$consulta->rowCount();
   
     //comprobar si el usuario esta registrado o no       
    if($numRegistros==0){
        header("Location: noRegistrado.php");
         
    }
    else{
        header("Location: registrado.php");
    }
}






?>