<?php
    
    //abro sesion
 session_start();
 //obtengo el nombre de la sesion abierta en el index
 $user = unserialize($_SESSION['user']); 

 require_once "../index.php";

 
?>