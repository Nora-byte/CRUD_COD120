<?php 

if(!isset($_GET['codigo'])){
    header('Location:index.php?mensaje=error');
    exit();
}

include_once 'model/conextion.php';
$codigo = $_GET['codigo'];
$sentencia = $bd->prepare("select * from telefonos where codigo = ?;");
$sentencia->execute([$codigo]);
$telefonos = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($telefonos);
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Telefonos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  </head>
  <body>
      <div class="container-fluid bg-warning">
          <div class="row">
              <div class="col-md">
                  <header class="py-2">
                    <h3 class="text-center">Telefonos</h3>
                  </header>
              </div>
              <div class="col-md">
                  <header class="py-2">
                    <h3 class="text-center"> </h3>
                  </header>
              </div>
              <div class="col-md">
                  <header class="py-2">
                    <h3 class="text-center"> </h3>
                  </header>
              </div>
              <div class="col-md">
                <header class="my-0">
                <p id="ubicacion" class="text-left">santiago de chile.</p>
                </header>
              </div>
              <div class="col-md">
                <header class="my-0">
                <p id="temperatura" class="text-rigth">temperaura</p>
                </header>
              </div>
          </div>
      </div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="update_progress.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="name" required value="<?php echo $telefonos->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Departamento: </label>
                        <input type="text" class="form-control" name="depart" required value="<?php echo $telefonos->departamento; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="number" class="form-control" name="phone" required value="<?php echo $telefonos->numero; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Anexo: </label>
                        <input type="number" class="form-control" name="anexo" required value="<?php echo $telefonos->anexo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notas: </label>
                        <input type="textarea" class="form-control" name="note" required value="<?php echo $telefonos->nota; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $telefonos->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="container-fluid bg-dark fixed-bottom">
      <div class="row">
        <div class="col-md text-light text-center py-1">
           Yerko fuentes
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>