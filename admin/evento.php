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

    <!-- formulário de edição -->
    <form action="">
    <div class="container">
        <div class="row mb-2">
            <div class="col-6">
                <label for="txt-nome" class="form-label">Nome do evento</label>
                <input type="text" class="form-control" id="txt-nome" name="txtNome" placeholder="insira o nome do evento" value="<?= $evento->nome ?>">
            </div>  
        </div>
        <div class="row mb-2">
            <div class="col-4">
                <label for="txt-data" class="form-label">Data</label>
                <input type="date" class="form-control" id="txt-data" name="txtData" value="<?= $evento->data ?>">
            </div>  
        </div>
    </div>

    </form>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>