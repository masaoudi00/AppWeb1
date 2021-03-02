<?php
        require 'conexion.php';
        $id = $_GET['id'];
       
        $sql="DELETE FROM paciente WHERE id=:id ";
        $sentencia=$connection->prepare($sql);
        if($sentencia->execute([ ':id' => $id])){
            header("Location: ./");
        }else{
            $message ="Data not Updated";
        }


    ?>
  <?php include 'header.php'; ?>
    
     
      
  <?php include 'footer.php'; ?>