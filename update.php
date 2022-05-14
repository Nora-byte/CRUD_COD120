<?php include 'template/header.php' ?>
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
<?php include 'template/footer.php' ?>