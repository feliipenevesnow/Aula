<?php
include 'fragmentos/header.php';
?>

<main>
    <div class="container">
        <div class="row justify-content-center">

            <div class="card col-md-4 col-6 mt-5">
                <div class="card-body">
                    <h2 class="card-tittle">Cadastro</h2>
                    <form action="_cadastrar_usuario.php" method="POST">
                    <div class="form-group">
                            <label for="nome">Nome</label>
                            <input name="nome" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input name="senha" type="password" class="form-control">
                        </div>
                        <div class="row justify-content-end mt-3">
                            <button type="submit" class="btn btn-dark col-4">Entrar</button>
                            <a href="index.php" class="btn btn-dark ms-3 col-4">Voltar</a>
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