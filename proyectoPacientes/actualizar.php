<?php
        require 'conexion.php';
        $id = $_GET['id'];
        $sql="SELECT * FROM paciente WHERE id=:id";
       $sentencia=$connection->prepare($sql);
       $sentencia->execute([':id' => $id]);

       $resultado=$sentencia->fetch(PDO::FETCH_OBJ);

       if(isset($_POST['nombre'])  && ($_POST['apellidos']) && ($_POST['direccion'])){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];

       
        //entonces lo inserto en la tabla de persona.
        $sql="UPDATE paciente SET nombre=:nombre, apellidos=:apellidos, direccion=:direccion WHERE id=:id ";
        $sentencia=$connection->prepare($sql);
        if($sentencia->execute([':nombre' => $nombre, ':apellidos' => $apellidos, ':direccion' =>$direccion, ':id' => $id])){
            $message= "Data updated succesfully";
            header("Location: ./");
            
        }else{
            $message ="Data not Updated";
        }

    }

    ?>
  <?php include 'header.php'; ?>
    
     <div class="container">
         <div class="card mt-5">
            <div class="card-header">
                <h2>Update person</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alet alert-success">
                        <?php echo $message ?>
                    </div>
                <?php endif; ?>
                <form method="post" >
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input value="<?= $resultado->nombre; ?>" type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input value="<?= $resultado->apellidos; ?>" readonly  type="text" name="apellidos" id="apellidos" placeholder="apellidos" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input value="<?= $resultado->direccion; ?>" type="text" name="direccion" id="direccion" placeholder="direccion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
      
  <?php include 'footer.php'; ?>