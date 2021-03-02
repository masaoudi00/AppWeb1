<?php
require ("conexion.php");

class Paciente{

    private $conexion = "";
    public $numero_pacientes = 0;

    function paciente(){
           $this->conexion=obtenerConexion();
    }//fin paciente

    function alta_paciente($nombre,$direccion){//funcion alta_paciente
        try {
            // preparar y vincular parámetros
            $stmt = $this->conexion->prepare("INSERT INTO mibbdd (nombre, direccion )
            VALUES (:nombre, :direccion)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':direccion', $direccion);

            //ejecutamos la sentencia sql
            $stmt->execute();
     
     
     } catch(PDOException $e) {
     
            echo "Error: " . $e->getMessage();
     
     }
     
     $conexion = null;

    }//fin alta_pacientes

    function listar_pacientes(){//listar_pacientes
       try {
              $stmt = $this->conexion->prepare("SELECT   id, nombre, direccion FROM mibbdd");
              
              $stmt->execute();
   
   
       } catch(PDOException $e) {
               echo "Error: " . $e->getMessage();
       }
   
         return $stmt;
   }//fin listar_paciente

   function obtener_paciente_porId($id){//listar_pacientes
       try {
              $stmt = $this->conexion->prepare("SELECT   id, nombre, direccion FROM mibbdd WHERE id=".$id);
              
              $stmt->execute();
   
   
       } catch(PDOException $e) {
               echo "Error: " . $e->getMessage();
       }
   
         return $stmt;
   }//fin listar_paciente

   function modificar_paciente($id,$nombre,$direccion){//modificar pacientes
          try{
                 $sql= $this->conexion->prepare("UPDATE mibbdd SET nombre=:nombre, direccion=:direccion WHERE id=:id");
                 $sql->bindParam(":id",$id);
                 $sql->bindParam(":nombre",$nombre);
                 $sql->bindParam(":direccion",$direccion);

                 $sql->execute();

          }catch(PDOException $e){
              echo "Error al modificar".$e;
          }
   }

   function borrar_paciente($id){//borrar paciente
       try {
              $stmt = $this->conexion->prepare("DELETE  FROM  mibbdd WHERE id=:id");
              $stmt->bindParam(":id",$id);
              $stmt->execute();
   
   
       } catch(PDOException $e) {
               echo "Error: " . $e->getMessage();
       }
   
         return $stmt;
   }//fin listar_paciente

}
