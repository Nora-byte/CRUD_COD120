<?php include 'template/header.php' ?>

<?php 
  include_once "model/conextion.php";
  $sentencia = $bd -> query("select * from telefonos");
  $telefonos = $sentencia->fetchAll(PDO::FETCH_OBJ);
  //print_r($telefonos);
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <!-- inicio alerta -->

      <?php 
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Falta!</strong> Rellenar los campos faltantes. 
          <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
        </div>
        <?php 
        }      
      ?>

      <?php  
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registrado!</strong> Se agrego los nuevos datos. 
          <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
        </div>
        <?php 
        }      
      ?> 

      <?php  
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Cambiado!</strong> Se actualizaron los datos. 
          <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
        </div>
        <?php 
        }      
      ?> 

      <?php  
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Eliminado!</strong> Se ha eliminado los datos. 
          <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
        </div>
        <?php 
        }      
      ?> 

      <?php 
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Vuelve a intentarlo. 
          <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
        </div>
        <?php 
        }      
      ?> 

      <!-- fin alerta-->
      <div class="card">
        <div class="card-header">
          Lista de personas
        </div>
        <div class="p-4">
          <table class="table align-middle">
            <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Dpto.</th>
                <th scope='col'>Numero</th>
                <th scope='col'>Anexo</th>
                <th scope='col'>Nota</th>
                <th scope="col" colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach($telefonos as $dato){
              ?>
              <tr>
                <td scope='col'><?php echo $dato->codigo; ?></td>
                <td><?php echo $dato->nombre; ?></td>
                <td><?php echo $dato->departamento; ?></td>
                <td><?php echo $dato->numero; ?></td>
                <td><?php echo $dato->anexo; ?></td>
                <td><?php echo $dato->nota; ?></td>
                <td><a class="text-success" href="update.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i</a></td>
                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="delete.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash3"></i></a></td>
              </tr>
              <?php 
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Ingresar datos:
        </div>
        <form class="p-4" method="POST" action="create.php">
          <div class="mb-3">
            <label class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="name" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Departamento: </label>
            <input type="text" class="form-control" name="depart" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Telefono: </label>
            <input type="number" class="form-control" name="phone" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Anexo: </label>
            <input type="number" class="form-control" name="anexo" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Notas: </label>
            <input type="textarea" class="form-control" name="note" autofocus required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'template/footer.php' ?>