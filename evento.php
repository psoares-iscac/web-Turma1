<?php 
if(empty($_GET['id'])){
    header('Location:index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desenvolvimento para a Web</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <style>
    html {
        scroll-behavior: smooth;
    }
</style>
</head>
<body>
<?php require('includes/connection.php') ?>
<?php require('includes/menu.php'); ?> 
<?php 
$id = $_GET['id'];
$sql = 'SELECT * FROM eventos WHERE id = :id';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
if($stmt && $stmt->rowCount() == 1){
    $evento = $stmt->fetchObject();
    $imagem = filter_var($evento->imagem, FILTER_VALIDATE_URL) !== false ? $evento->imagem : 'imgs/eventos/'.$evento->imagem;
    $data = new DateTime($evento->data);
    $formatada = new IntlDateFormatter(
        'pt_pt', // Idioma
        IntlDateFormatter::FULL, // Estilo para a data completa
        IntlDateFormatter::NONE // Sem hora
    );
    $dataExtenso = $formatada->format($data);
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <div class="display-5"><?= $evento->nome ?></div>
            <p class="mt-2 fs-5 fw-bold"><i class="me-2 bi bi-calendar3"></i><?= $dataExtenso ?></p>
            <p class="mt-2 fs-5"><i class="me-2 bi bi-card-text"></i><?= $evento->descricao ?></p>
            <p class="mt-2 fs-5"><i class="me-2 bi bi-geo-alt"></i>Cabeceira de cima</p>
            <button class="mt-3 p-3 btn btn-outline-info fs-4">QUERO PARTICIPAR <i class="mx-4 bi bi-arrow-right-square-fill"></i></button>
        </div>
        <div class="col-4">
            <img class="img-fluid w-100" src="<?= $imagem ?>" alt="imagem do evento">
        </div> 
    </div>
</div>
<!-- descrição mais completa e algumas imagens -->
<div class="container">
    <div class="row">
        <div class="col-6 fs-3 border-bottom border-dark">Descrição</div>
    </div>
    <div class="row mt-3">
        <div class="col-9">
            <p class="lh-lg">
                <?= $evento->texto ?>
            </p>
            
        </div>
        <div class="col-3">
            <div class="row g-3 gallery">
                <div class="col-4 ">
                    <a href="https://via.placeholder.com/800" target="_blank">
                    <img class="w-100" src="https://via.placeholder.com/300" alt="Imagem 1">
                    </a>
                </div>
                <div class="col-4 ">
                    <a href="https://via.placeholder.com/800" target="_blank">
                    <img class="w-100" src="https://via.placeholder.com/300" alt="Imagem 2">
                    </a>
                </div>
                <div class="col-4 ">
                    <a href="https://via.placeholder.com/800" target="_blank">
                    <img class="w-100" src="https://via.placeholder.com/300" alt="Imagem 3">
                    </a>
                </div>
                <div class="col-4 ">
                    <a href="https://via.placeholder.com/800" target="_blank">
                    <img class="w-100" src="https://via.placeholder.com/300" alt="Imagem 4">
                    </a>
                </div>
                </div>
            </div>    
        </div>
    </div>
</div>
<!-- comentários -->
<?php
$sql = 'SELECT * FROM comentarios WHERE eventoId = :i ORDER BY id DESC';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':i', $id);
$stmt->execute();
if(!$stmt || $stmt->rowCount() == 0){
    $resultados = false;
}else $resultados = true;
?>

<!-- lista de comentarios -->
<div id="comentarios" class="container">
    <div class="row">
        <div class="col-6 fs-3 border-bottom border-dark">Comentários</div>
    </div>
    <?php
    if($resultados){
        while($c = $stmt->fetchObject()){
    ?>
            <div class="row">
                <div class="col-auto">
                    <i class="bi bi-person-bounding-box" style="font-size:48px;"></i>
                </div>
                <div class="col p-3">
                    <div class="fw-light"><?= $c->email ?>, <?= $c->date ?></div>
                    <div><?= $c->mensagem ?></div>
                </div>
            </div>
    <?php 
        }
    }else{
        echo '<p>Ainda não foram inseridos comentários.</p>';
    }
    ?>
</div>

<!-- inserir comentarios -->
<div style="width:400px;" class="mt-5 mx-auto">
    <form action="formData/comentarioInserir.php" method="GET">
        <input type="hidden" name="eventoId" value="<?= $id ?>">
        <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="com-email" placeholder="name@example.com">
            <label for="floatingInput">Endereço de Email</label>
        </div>
        <div class="form-floating">
            <textarea name="mensagem" class="form-control" placeholder="Deixe a sua mensagem" id="com-mensagem"></textarea>
            <label for="floatingTextarea">Deixe a sua mensagem</label>
        </div>
        <div class="form-check mt-2 mb-2">
            <input name="aceito" class="form-check-input" type="checkbox" value="sim" id="com-check" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Permito tratamento dos meus dados
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Enviar comentário</button>
    </form>
</div>


<div style="height:300px;"></div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>