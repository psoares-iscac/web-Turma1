<?php 
if(empty([$_GET['id']])){
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
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    
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
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <div class="display-5"><?= $evento->nome ?></div>
            <div class="mt-2 fs-5 fw-bold"><?= $formatada->format($data) ?></div>
            <div class="mt-2 fs-5"><?= $evento->descricao ?></div>
            <div class="mt-2 fs-5">Local: localização do evento</div>
        </div>
        <div class="col-4">
            <img class="img-fluid w-100" src="<?= $imagem ?>" alt="imagem do evento"
            style="">
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
            <?= $evento->texto ?>
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
<div class="container">
    <div class="row">
        <div class="col-6 fs-3 border-bottom border-dark">Comentários</div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>