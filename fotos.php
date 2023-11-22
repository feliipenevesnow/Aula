<?php
include 'fragmentos/header.php';
include '_funcoesConfigBanco.php';

$con = conectarBanco();

$sql = "select * from foto";

$fotos = executarSelect($con, $sql);

?>




<main>

    <div class="container">
        <div class="row justify-content-center">

            <?php
            foreach ($fotos as $foto) {

                $sql = "select * from curtida where foto = " . $foto['codigo'] . " and usuario = " . $_SESSION['usuario']['codigo'];

                $resultado = executarSelect($con, $sql);
                ?>

                <div class="card col-md-4 col-6 mt-5">
                    <div class="card-body">
                        <h2 class="card-tittle"></h2>
                        <img style="width: 250px; height: 250px" src="upload/<?= $foto['imagem'] ?>" alt="">
                    </div>
                    <a href="_curtir.php?foto=<?= $foto['codigo'] ?>">
                        <?php
                        if (count($resultado) == 0) { ?>
                            <i class="fa-regular fa-heart" style="font-size: 30px; color: red"></i>
                        <?php } else { ?>
                            <i class="fa-solid fa-heart" style="font-size: 30px; color: red"></i>
                        <?php }
                        ?>
                    </a>
                    <form action="_carrinho.php?foto=<?= $foto['codigo'] ?>" method="post" class="p-4">
                        <div class="row">
                            <input type="number" min="0" name="quantidade" class="form-control">
                            <button class="btn btn-dark">ADC C.</button>
                        </div>
                    </form>
                </div>

                <?php
            }
            ?>


        </div>
    </div>

</main>

<?php
include 'fragmentos/footer.php';
?>