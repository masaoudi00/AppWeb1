<?php
        require 'conexion.php';
        
        $message ='';
        if(isset($_POST['nombre'])  && ($_POST['apellidos']) && ($_POST['direccion'])){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $direccion = $_POST['direccion'];

            //entonces lo inserto en la tabla de persona
            $sql="INSERT INTO paciente (nombre, apellidos, direccion) VALUES (:nombre, :apellidos, :direccion)";
            $sentencia=$connection->prepare($sql);
            if($sentencia->execute([':nombre' => $nombre, ':apellidos' => $apellidos, ':direccion' => $direccion])){
                $message= "Data inserted succesfully";
                header("Location: ./");
            }else{
                $message ="Data not inserted";
            }

        }
    ?>

<?php include 'header.php'; ?>
    
     <div class="container">
         <div class="card mt-5">
            <div class="card-header">
                <h2>Create person</h2>
            </div>
            <div class="card-body ">
                <?php if(!empty($message)): ?>
                    <div class="alet alert-success">
                        <?php echo $message ?>
                    </div>
                <?php endif; ?>
                <form method="post" >
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" placeholder="apellidos" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion" placeholder="direccion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">create</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
        
     <?php include 'footer.php'; ?>