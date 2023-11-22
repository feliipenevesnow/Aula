<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid text-light">
                <div>
                    <?php
                    if (!isset($_SESSION['usuario'])) {
                        ?>

                        <a class="navbar-brand text-light" href="index.php">Login</a>

                        <?php
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['usuario'])) {
                        ?>

                        <a class="navbar-brand text-light" href="fotos.php">Fotos</a>

                        <?php
                        if ($_SESSION['usuario']['nivel_acesso'] == "Administrador") {
                            ?>
                            <a class="navbar-brand text-light" href="cadastrar_fotos.php">Cadastrar Foto</a>
                            <?php
                        }
                        ?>

                        <a class="navbar-brand text-light" href="_sair.php">Sair</a>


                    </div>

                    <div class="d-flex" role="search">
                        <a class="navbar-brand text-light">Olá,
                            <?= $_SESSION['usuario']['nome'] ?>
                        </a>
                    </div>

                    <?php
                    }
                    ?>
            </div>
        </nav>
    </header>