<!DOCTYPE html>

<html>

<body>


<?php

$id = intval($_GET['id']);


//AQUÍ VA EL CÓDIGO PARA OBTENER LA CONEXIÓN
require "conexion.php";

$sql="SELECT * FROM paciente WHERE id = '".$id."'";

$pacientes = mysqli_query($con,$sql);


echo "<table>

<tr>

<th>Nombre</th>

<th>Dirección</th>

</tr>";

while($paciente = mysqli_fetch_array($pacientes )) {

  echo "<tr>";

  echo "<td>" . $paciente ['nombre'] . "</td>";

  echo "<td>" . $paciente ['direccion'] . "</td>";

  echo "</tr>";

}

echo "</table>";

mysqli_close($con);

?>

</body>

</html> 