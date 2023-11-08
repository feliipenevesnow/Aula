<?php
include 'fragmentos/header.php';
?>

<main>
    <div class="container">
        <div class="row justify-content-center">

            <div class="card col-md-4 col-6 mt-5">
                <div class="card-body">
                    <h2 class="card-tittle">Login</h2>
                    <form action="_autenticar.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input name="senha" type="password" class="form-control">
                        </div>

                        <?php
                            if( isset($_GET['erro']) ){
                        ?>

                        <div class="alert mt-2 alert-danger p-0" role="alert">
                            <p class="m-2">Senha ou Email incorreto!</p>
                        </div>

                        <?php
                            }
                        ?>

                        <div class="row justify-content-end mt-3">
                            <button type="submit" class="btn btn-dark col-4">Entrar</button>
                            <a href="cadastrar.php" class="btn btn-dark col-4 ms-3">Cadastrar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

<?php
include 'fragmentos/footer.php';
?>