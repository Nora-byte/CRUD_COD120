<?php
include_once "model/conextion.php";
$sentencia = $bd->query("select * from telefonos");
$telefonos = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($departamentos);
?>

<!doctype html>
<html lang="es">

<head>
  <title>Telefonos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>

<body>
  <div class="container-fluid bg-warning">
    <div class="row">
      <div class="col-md">
        <header class="py-2">
          <h3 class="text-center">Directorio</h3>
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
        <header class="py-2">
          <h6 id="ubicacion" class="text-left"> </h6>
        </header>
      </div>
      <div class="col-md">
        <header class="py-2">
          <h6 id="temperatura" class="text-rigth"> </h6>
        </header>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <!-- inicio alerta -->
        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
        ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Falta!</strong> Rellenar los campos faltantes.
            <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
          </div>
        <?php
        }
        ?>

        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agrego los nuevos datos.
            <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
          </div>
        <?php
        }
        ?>

        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Se actualizaron los datos.
            <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
          </div>
        <?php
        }
        ?>

        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
        ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Se ha eliminado los datos.
            <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
          </div>
        <?php
        }
        ?>

        <?php
        if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
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
            Agendas del Personal
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
                foreach ($telefonos as $dato) {
                ?>
                  <tr>
                    <td scope='col'><?php echo $dato->codigo; ?></td>
                    <td><?php echo $dato->nombre; ?></td>
                    <td><?php echo $dato->departamento; ?></td>
                    <td><?php echo $dato->numero; ?></td>
                    <td><?php echo $dato->anexo; ?></td>
                    <td><?php echo $dato->nota; ?></td>
                    <td><a class="text-success" href="update.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i< /a>
                    </td>
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
            Ingresar datos Personal
          </div>
          <form class="p-4" method="POST" action="create.php">
            <div class="mb-3">
              <label class="form-label">Nombre: </label>
              <input type="text" class="form-control" name="name" autofocus required>
            </div>
            <div class="mb-3">
              <label class="form-label">Departamento: </label>
              <input type="combobox" class="form-control" name="depart" autofocus required>
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
  <footer class="container-fluid bg-dark fixed-bottom">
    <div class="row">
      <div class="col-md text-light text-center py-1">
        Yerko fuentes
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="api/app.js"></script>
</body>

</html>