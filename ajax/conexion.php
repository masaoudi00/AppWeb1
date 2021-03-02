<?php

define("SERVIDOR","localhost");
define("USUARIO","root");
define("CLAVE","");
define("BBDD","mouhcine");


//$bbdd="nombreBaseDatos";

$con=mysqli_connect(SERVIDOR,USUARIO,CLAVE,BBDD) or die("Problemas con la conexión a la base de datos:".mysqli_connect_error()) ;


echo "<p>Conexión realizada";

mysqli_set_charset($con,'utf8');

return $con;


?>