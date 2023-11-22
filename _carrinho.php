<?php

session_start();

$foto = $_GET['foto'];
$quantidade = $_POST['quantidade'];

if($quantidade == 0){
    $index = 0;
    foreach($_SESSION['carrinho'] as $item){
        if($item[0] == $foto){
            unset($_SESSION['carrinho'][$index]);
        }
        $index++;
    }
}else{
    $index = 0;
    $achou = false;
    foreach($_SESSION['carrinho'] as $item){
        if($item[0] == $foto){
           $_SESSION['carrinho'][$index][1] += $quantidade;
           $achou = true;
        }
        $index++;
    }
    
    if(!$achou){
        $item = array();
        $item = [$foto, $quantidade];
        $_SESSION['carrinho'][] = $item;
    }
}


print_r($_SESSION['carrinho']);

header("Location: fotos.php");
