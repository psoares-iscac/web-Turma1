<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desenvolvimento para a Web</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    
</head>
<body>
    <?php require('includes/connection.php') ?>
    <?php require('includes/menu.php'); ?>    

    <div class="container">
        <div class="row row-cols-2 row-cols-md-4 row-gap-5">
            <?php
                $sql = 'SELECT * FROM eventos WHERE visivel = 1 ORDER BY data';
                $stmt = $dbh->prepare($sql);
                $stmt->execute();

                
                if($stmt && $stmt->rowCount() > 0){
                    while($evento = $stmt->fetchObject()){
                        $imagem = filter_var($evento->imagem, FILTER_VALIDATE_URL) !== false ? $evento->imagem : 'imgs/eventos/'.$evento->imagem;
                        ?>
                        <div class="col position-relative d-flex flex-column">
                            <div>
                                <img class="w-100 img-fluid" src="<?= $imagem ?>" alt="">
                            </div>
                            <div class="fw-bold"><?= $evento->nome ?></div>
                            <div class="fw-light"><?= $evento->data ?></div>
                            <div class="mb-2"><?= $evento->descricao ?></div>
                            <a class="mt-auto btn btn-outline-secondary w-100 stretched-link">Detalhes</a>
                        </div>          
                    <?php
                    }
                }
            ?>
        </div>
    </div>

    <div class="w-100" style="height:300px;">&nbsp;</div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>