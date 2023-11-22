<?php

include '_funcoesConfigBanco.php';

$con = conectarBanco();

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "select * from usuario where email = '$email' and senha = '$senha'";

$usuarios = executarSelect($con, $sql);

$usuario = $usuarios[0];

if( count($usuarios) == 1 ){
    session_start();

    $_SESSION['usuario'] = $usuario;
    $_SESSION['carrinho'] = array();

    header("Location: fotos.php");
}else{
    header("Location: index.php?erro");
}