<?php
/* validar o tipo de acesso */
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location:../index.php');
    die();
}

/* obter os dados introduzidos, com uma pequena validação */
$id         = !empty($_POST['eventoId']) ? $_POST['eventoId'] : false;
$nome       = !empty($_POST['txtNome']) ? $_POST['txtNome'] : false;
$data       = !empty($_POST['txtData']) ? $_POST['txtData'] : false;
$descricao  = !empty($_POST['txtDescricao']) ? $_POST['txtDescricao'] : false;
$info       = !empty($_POST['editorContent']) ? $_POST['editorContent'] : false;

if(!$nome || !$data || !$descricao || !$info){
    header('Location:../evento.php?id='.$id);
    die();
}

$imgAtualizada = false; // Flag para verificar se a imagem foi carregada

/* dados do upload da imagem, se for submetida  */
if (isset($_FILES['fileImg']) && $_FILES['fileImg']['error'] === UPLOAD_ERR_OK) {
    // Informações do arquivo
    $fileTmpPath    = $_FILES['fileImg']['tmp_name']; // Caminho temporário
    $fileName       = $_FILES['fileImg']['name'];       // Nome original do arquivo
    $fileSize       = $_FILES['fileImg']['size'];       // Tamanho do arquivo
    $fileType       = $_FILES['fileImg']['type'];       // Tipo MIME
    $fileError      = $_FILES['fileImg']['error'];     // Código de erro

    // Pasta de destino para o upload
    $uploadDir = '../../imgs/eventos/';
        
    // Garantir que o diretório exista
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (in_array($fileType, $allowedMimeTypes)) {
        // Extensão do arquivo original
        $fileExtension = pathinfo($_FILES['fileImg']['name'], PATHINFO_EXTENSION);

        // Gerar um nome de arquivo único e aleatório
        $randomFileName = uniqid('evento_'.$id.'_', true) . '.' . $fileExtension;
        // Gerar nome aleatório com random_bytes
        //$randomFileName = 'evento_'.$id.'_'.bin2hex(random_bytes(16)) . '.' . $fileExtension;
        
        // Caminho final do arquivo
        $destination = $uploadDir . $randomFileName;

        // Mover o arquivo para o destino, se der erro retorna á página do evento
        if (move_uploaded_file($fileTmpPath, $destination)) {
            $imgAtualizada = true;
        }else{
            header('Location:../evento.php?erro=file&msg=Erro no upload da imagem!!&id='.$id);
            die();
        }
    }else{
        header('Location:../evento.php?erro=tipo&msg=Tipo de ficheiro incorreto!!&id='.$id);
        die();
    }
}



/* imagem carregada ou não existente, atualizar dados no base de dados */
require('../includes/connection.php');
try{
    if($imgAtualizada === true){
        $sql = 'UPDATE eventos SET nome = :nome, data = :data, descricao = :descricao,
        texto = :info, imagem = :imagem WHERE id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':data' => $data,
            ':descricao' => $descricao,
            ':info' => $info,
            ':imagem' => $randomFileName,
            ':id' => $id
        ]);
    }else{
        $sql = 'UPDATE eventos SET nome = :nome, data = :data, descricao = :descricao,
        texto = :info WHERE id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':data' => $data,
            ':descricao' => $descricao,
            ':info' => $info,            
            ':id' => $id
        ]);
    }
}catch(PDOException $e){
    header('Location:../evento.php?erro=db&msg=Erro na atualização da base de dados!!&id='.$id);
    die();
}

/* se correu tudo bem, voltar ao evento */
header('Location:../evento.php?erro=no&msg=Dados atualizados&id='.$id);
die();

//echo $fileType;
//echo htmlspecialchars($info);

