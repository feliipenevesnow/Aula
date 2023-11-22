<?php

include '_funcoesConfigBanco.php';

session_start();

$con = conectarBanco();

$total = 0;

$carrinho = $_SESSION['carrinho'];

foreach ($carrinho as $item) {
    $sql = "select * from foto where codigo = " . $item[0];

    $foto = executarSelect($con, $sql)[0];

    $total += $foto['preco'] * $item[1];
}

$cliente = $_SESSION['usuario']['codigo'];
$data = date('Y-m-d');

$sql = "insert into compra(cliente, total, data) values($cliente, $total, '$data')";

executarInsert($con, $sql);

$sql = "select * from compra order by codigo desc";

$compra = executarSelect($con, $sql)[0];

$compra_id = $compra['codigo'];


foreach ($carrinho as $item) {
    $sql = "select * from foto where codigo = " . $item[0];

    $foto = executarSelect($con, $sql)[0];

    $subtotal += $foto['preco'] * $item[1];

    $sql = "insert into item_venda values($compra_id, ".$item[0].", ".$item[1].", '$subtotal')";

    executarInsert($con, $sql);
}


unset($_SESSION['carrinho']);

$_SESSION['carrinho'] = array();

header("Location: fotos.php");
