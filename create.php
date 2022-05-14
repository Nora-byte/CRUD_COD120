<?php 

//print_r($_POST);
if(empty($_POST["oculto"]) || empty($_POST["name"]) || empty($_POST["depart"]) || empty($_POST["phone"]) || empty($_POST["anexo"]) || empty($_POST["note"]) ){
        header('Location: index.php?mensaje=falta');
        exit();         
    }

    include_once 'model/conextion.php';
    $nombre = $_POST["name"];
    $departamento = $_POST["depart"];
    $numero = $_POST["phone"];
    $anexo = $_POST["anexo"];
    $nota = $_POST["note"];

    $sentencia = $bd->prepare("INSERT INTO telefonos(nombre,departamento,numero,anexo,nota) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$departamento,$numero,$anexo,$nota]);

    if($resultado === TRUE){
        header('Location: index.php?mensaje=registrado');
    } else{
        header('Location: index.php?mensaje=error');
        exit();
    }
?>