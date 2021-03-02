
<?php
    require 'conexion.php';
    echo "<style>";
   include 'estilo/css.css';
   echo "</style>";
    $sql=$connection->prepare("SELECT * FROM paciente");
    $sql->execute();

    $resultado= $sql->fetchAll(PDO::FETCH_OBJ);
   
?>

<?php include 'header.php'; ?>

  <div class="container">
    <div class="card mt-4">
        <div class="card-header">
                <h3>Gestion de Pacientes</h3>
                <a href='#modelId' class='btn btn-WARNING' data-toggle='modal'>CREATEMODAL</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>DIRECCION</th>
                    <th colspan=2>ACTION</th>
                </tr>
              
                <?php foreach($resultado as $persona): ?>
                <tr>
                    <td><?= $persona->id; ?></td>
                    <td><?= $persona->nombre;  ?></td>
                    <td><?= $persona->apellidos; ?></td>
                    <td><?= $persona->direccion; ?></td>
                    <td><a href="actualizar.php?id=<?= $persona->id ?>" class="btn btn-info">Edit</a></td>
                    <td><a href='#myModal' class='btn btn-danger' data-toggle='modal'>Delete</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


<!--//////////////////crear usuario con modal/////////////////////////////-->


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CREATE PACIENTE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body" id="formulario">
            <form method="post" id="idAgregar" >
            
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input  type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input  type="text" name="apellidos" id="apellidos" placeholder="apellidos" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input  type="text" name="direccion" id="direccion" placeholder="direccion" class="form-control" required>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <div class="form-group">
                            <a id="agregar" class="btn btn-danger">agregar</a>
                        </div>
                     </div>
                   
                </form>
            </div>
           
        </div>
    </div>
</div>

<script>
 $(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
            $("#agregar").on('click', function(){
            
             var nombre= $('#nombre').val();
            var apellidos = $('#apellidos').val();
            var direccion= $("#direccion").val();
   
          if (nombre !="" && apellidos !="" && direccion !=""){
         console.log(nombre);
              $.ajax({
                url:"agregar.php",
                dataType:"html",
                type:"POST",
                data:{
                    nombre: nombre,
                    apellidos: apellidos,
                    direccion: direccion
                },
                cache:false,
                success:function () {
                    alert("ok");
            }
              
              });
          }else
          {
              alert("faltan datos");
          }
          $("#nombre").val("");
          $("#apellidos").val("");
          $("#direccion").val("");
    
      })
            });

</script>







<!--////////FIN MODAL CREAR USUARIO/////////////////////////////////-->



<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<a href="borrar.php?id=<?= $persona->id?>" class="btn btn-danger">Eliminar</a>
			</div>
		</div>
	</div>
</div>     
       
<?php include 'footer.php'; ?>