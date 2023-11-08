<?php

include '_funcoesConfigBanco.php';

$con = conectarBanco();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "insert into usuario(nome, email, senha, nivel_acesso)". 
" value('$nome','$email','$senha','Cliente') ";

executarInsert($con, $sql);

header("Location: _autenticar.php?email=$email&senha=$senha");