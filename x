             <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="foto_perfil">Foto</label>
                            <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*">
                        </div>
                        <div class="col-md-6 form-group">
                            <img id="preview" src="" alt="Preview da foto" style="max-width: 100px; max-height: 100px;">
                        </div>
                    </div>
     
     <script>
                        document.getElementById('foto_perfil').addEventListener('change', function() {
                            var preview = document.getElementById('preview');
                            var file = document.getElementById('foto_perfil').files[0];
                            var reader = new FileReader();

                            reader.onloadend = function() {
                                preview.src = reader.result;
                            }

                            if (file) {
                                reader.readAsDataURL(file);
                            } else {
                                preview.src = "";
                            }
                        });
                    </script>

if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
    $uploadDirectory = 'upload/';

    $extensao = pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION);


    $imagem_nome = time() . '.' . $extensao;

    $diretorio = $uploadDirectory . time() . '.' . $extensao;

    print_r($imagem_nome);

    if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $diretorio)) {

        $data = new DateTime();
        $dataFormatada = $data->format('Y-m-d');

        if(isset($servico)){
        $sql = "INSERT INTO foto (imagem, data, descricao, servico) 
            VALUES ('$imagem_nome', '$dataFormatada', '$descricao', '$servico')";
        }else{
            $sql = "INSERT INTO foto (imagem, data, descricao, usuario) 
            VALUES ('$imagem_nome', '$dataFormatada', '$descricao', '$usuario')";
        }
           

        executarInsert($con, $sql);
    } 

} 
----------------------------

$imagem = $_GET['imagem'];

if(isset($_GET['servico'])){
    $sql = "delete from foto where codigo = $foto and servico = $servico";
}else{
    $sql = "delete from foto where codigo = $foto and usuario = $usuario";
}


executarDelete($con, $sql);

$uploadDirectory = 'upload/';


$files = glob($uploadDirectory . $imagem);

if (!empty($files)) {
    $filePath = $files[0];
    $fileInfo = pathinfo($filePath);
    $fileExtension = $fileInfo['extension'];
    if (unlink($filePath)) {
        echo "Arquivo deletado com sucesso.";
    } else {
        echo "Falha ao deletar o arquivo.";
    }
} else {
    echo "Arquivo não encontrado.";
}

if(isset($_GET['servico'])){
    header("Location: fotoServico.php?servico=$servico");
}else{
    header("Location: perfil.php?#gallery");
}