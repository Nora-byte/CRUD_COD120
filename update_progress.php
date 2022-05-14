<?php 

print_r($_POST);
if(!isset($_POST['codigo'])){
    header('Location: index.php?mensaje=error');
}

include 'model/conextion.php';
$codigo = $_POST['codigo'];
$nombre = $_POST['name'];
$departamento = $_POST['depart'];
$telefono = $_POST['phone'];
$anexo = $_POST['anexo'];
$nota = $_POST['note'];

$sentencia = $bd->prepare("UPDATE telefonos SET nombre = ?, departamento = ?, numero = ?, anexo = ?, nota = ? where codigo = ?;");
$resultado = $sentencia->execute([$nombre, $departamento, $telefono, $anexo, $nota, $codigo]);

if($resultado === TRUE){
    header('Location: index.php?mensaje=editado');
}else{
    header('Location: index.php?mensaje=error');
    exit();
}
?>