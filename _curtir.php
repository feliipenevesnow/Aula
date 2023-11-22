<?php
include '_funcoesConfigBanco.php';

session_start();

$con = conectarBanco();

$foto = $_GET['foto'];
$usuario = $_SESSION['usuario']['codigo'];

$sql = "select * from curtida where foto = $foto and usuario = $usuario";

$resultado = executarSelect($con, $sql);

if(count($resultado) == 0){
    $sql = "insert into curtida values($usuario, $foto)";
    executarInsert($con, $sql);
}else{
    $sql = "delete from curtida where usuario = $usuario and foto = $foto";
    executarDelete($con, $sql);
}

header("Location: fotos.php");