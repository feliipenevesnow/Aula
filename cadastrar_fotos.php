<?php
include 'fragmentos/header.php';
?>

<main>

    <form class="row g-3">

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Titulo</label>
            <input type="text" class="form-control" name="titulo" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Preço</label>
            <input class="form-control" name="preco" type="text" 
            id="valor" data-max-digits="15" maxlength="20" />
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="foto_perfil">Foto</label>
                <input type="file" name="foto_perfil" id="foto_perfil" 
                accept="image/*">
            </div>
            <div class="col-md-6 form-group">
                <img id="preview" src="" alt="Preview da foto" 
                style="max-width: 100px; max-height: 100px;">
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-dark">Cadastrar</button>
        </div>

    </form>

</main>

<script>
    // usa vírgula como separador decimal, ponto como separador de milhar, sempre com 2 casas decimais
    const formatter = new Intl.NumberFormat('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    function mask(e) {
        const input = e.target;
        // elimina tudo que não é dígito
        input.value = input.value.replace(/\D+/g, '');
        if (input.value.length === 0) // se não tem nada preenchido, não tem o que fazer
            return;
        // verifica se ultrapassou a quantidade máxima de dígitos (pegar o valor no dataset)
        const maxDigits = parseInt(input.dataset.maxDigits);
        if (input.value.length > maxDigits) {
            // O que fazer nesse caso? Decidi pegar somente os primeiros dígitos
            input.value = input.value.substring(0, maxDigits);
        }
        // lembrando que o valor é a quantidade de centavos, então precisa dividir por 100
        input.value = formatter.format(parseInt(input.value) / 100);
    }

    document.querySelector('#valor').addEventListener('input', mask);
</script>

<?php
include 'fragmentos/footer.php';
?>