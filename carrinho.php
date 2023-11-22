<?php
include 'fragmentos/header.php';
include '_funcoesConfigBanco.php';

$con = conectarBanco();
?>

<main>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Titulo</th>
      <th scope="col">Imagem</th>
      <th scope="col">preco</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>

  <?php

   $carrinho = $_SESSION['carrinho'];
$total = 0;
   foreach( $carrinho as $item){
    $sql = "select * from foto where codigo = ".$item[0];

    $foto = executarSelect($con, $sql)[0];

    $total += $foto['preco'] * $item[1];
  ?>

    <tr>
      <th scope="row"><?=  $foto['titulo'] ?></th>
      <td><img style="width: 60px; height: 60px;" src="upload/<?=  $foto['imagem'] ?>" alt=""></td>
      <td><?=  $foto['preco'] ?></td>
      <td><?=  $item[1] ?></td>
      <td>R$ <?=  $foto['preco'] * $item[1]  ?></td>
    </tr>

   
  <?php
   }
?>

  </tbody>
</table>

<h4>R$ <?=  $total  ?></h4>
<a href="_finalizarVenda.php" class="btn btn-dark">Finalizar Venda</a>
</main>

<?php
include 'fragmentos/footer.php';
?>