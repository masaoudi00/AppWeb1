<?php
 include_once ("paciente.php");

 $paciente = new Paciente();


  $nombre=$_POST['nombre'];
  $direccion=$_POST['direccion'];


 $consulta=$this->conexion->prepare("INSERT INTO mibbdd (nombre, direccion) VALUES (?,?)");

        $consulta->bindParam(1, $nombre);
        $consulta->bindParam(2, $direccion);
        
       if ($consulta->execute())
          alert("inserción correcta");
      else
           alert("inserción no correcta");
        
   
?>