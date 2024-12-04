<?php
if(empty($_GET['id'])){
    header('Location:eventos.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <style>        
        /* para evitar sobreposição sobro o input de file */
        .ql-container {
            height: auto;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <?php
    $id = $_GET['id'];
    require('includes/connection.php');
    $sql = 'SELECT * FROM eventos 
            WHERE id = :i';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':i', $id);
    $stmt->execute();
    
    if($stmt && $stmt->rowCount() == 1){
        $evento = $stmt->fetchObject();
    }
    ?>

    <!-- menu de navegação -->
    <div class="container mt-3 mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php" class="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="eventos.php" class="">Eventos</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Evento</li>
            </ol>
        </nav>
    </div>

    <?php 
    if(!empty($_GET['erro']) && !empty($_GET['msg'])){
        $erro   = $_GET['erro'];
        $msg    = $_GET['msg'];
        if($erro === 'no'){
            echo "
            <div class=\"container alert alert-success mb-4\" role=\"alert\">
                $msg
            </div>
            ";
        }else{ // ocorreu um erro
            echo "
            <div class=\"container alert alert-danger mb-4\" role=\"alert\">
                $msg
            </div>
            ";
        }
    }
    
    ?>



    <!-- formulário de edição  
     action=POST, enctype="..." porque envolve o upload de imagens -->
    <form action="formData/eventoEdicao.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventoId" id="evento-id" value="<?= $evento->id ?>">
    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <label for="txt-nome" class="form-label">Nome do evento</label>
                <input type="text" class="form-control" id="txt-nome" name="txtNome" placeholder="insira o nome do evento" value="<?= $evento->nome ?>">
            </div>  
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <label for="txt-data" class="form-label">Data</label>
                <input type="date" class="form-control" id="txt-data" name="txtData" value="<?= $evento->data ?>">
            </div>  
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="txt-descricao" class="form-label">Descrição do evento</label>
                <textarea class="form-control" id="txt-descricao" name="txtDescricao" 
                    placeholder="insira a descrição do evento" rows="2"><?= $evento->descricao ?></textarea>
            </div>  
        </div>
        <div class="row mb-4">
            <!-- Campo oculto para enviar o conteúdo -->
            <input type="hidden" name="editorContent" id="editor-content">
            <!-- exemplo de editor de texto WYSIWYG, quill - https://quilljs.com/  -->
            <div class="col">
                <label for="txt-informacao" class="form-label">Informação do evento</label>
                <div class="fs-6 border border-1" id="txt-informacao"> 
                    <?= $evento->texto ?>
                </div>
            </div>  
        </div>
        <div class="row mb-2">
            <div class="col">   
                <input type="file" class="form-control" id="file-img" name="fileImg" accept="image/*">
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-dark w-100 text-uppercase">Confirmar edição do evento</button>
        </div>
        

    </div>

    </form>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/quill.js"></script>
<script>
    /* inicialização do editor quill */
    const toolbarOptions = ['bold', 'italic', 'underline', 'strike'];

    const quill = new Quill('#txt-informacao', {
        theme:'snow',
        modules: {
            toolbar: toolbarOptions
        }
    });
    /* Função para garantir que o conteúdo do Quill seja enviado no formulário */
    document.querySelector('form').onsubmit = function() {
        // Coloca o conteúdo do Quill no campo oculto
        var editorContent = document.querySelector('#editor-content');
        editorContent.value = quill.root.innerHTML;  // ou quill.getText() para enviar apenas o texto
    };

    /* Esconder alerts 5 segundos depois de a página ser carregada */
    setTimeout(() => {
        const alertBox = document.querySelectorAll('.alert');
        alertBox.forEach( (al) => {
            al.style.display = 'none'; // Esconde o alerta
        })
    }, 5000);
</script>
</body>
</html>