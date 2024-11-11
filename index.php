<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
</head>
<body style="padding-top: 100px;">
    
    <?php
        require('includes/connection.php'); // $dbh
        require('includes/menu.php');
    ?>

    
    <p class="display-3">Eventos</p>
    <?php 
    $sql = 'SELECT * FROM eventos WHERE visivel = 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    /*if($stmt && $stmt->rowCount() > 0){
        while($evento = $stmt->fetchObject()){
            echo '<br>Data '.$evento->data.', '.$evento->nome;
        }
    }*/
    //echo $stmt->rowCount();
    ?>

    <div class="container mb-4">
        <div class="row">
            <?php 
            while($evento = $stmt->fetchObject()){
            ?>
            <div class="col-3">
                <div class="evento">
                    <div><img class="w-100 img-fluid" src="<?= $evento->imagem ?>" alt="" ></div>
                </div>
                <div class="fw-bold"><?= $evento->nome ?></div>
                <div class="fw-light" style="font-size:.8rem;"><?= $evento->data ?></div>
                <div><?= $evento->info ?></div>
                <button class="mt-2 mx-auto btn btn-outline-dark w-50">Saber mais</button>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>


    <?php 
        $dados = file_get_contents('utilizadores.json');
        // falta validar se ocorreu um erro
        //echo $dados;
        $users = json_decode($dados);
        //print_r($users);
    ?>

    <!-- com dados definidos ficheiro json -->    
    <table class="table" id="tabela-1">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>&nbsp;</th>
        </thead>
        <tbody id="tbody-1">
            <?php foreach($users as $user){ ?>
                <tr>
                    <td><?= $user->nome ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <img src="imgs/avatares/<?= $user->foto ?>" style="width:35px;" alt="foto pessoal">
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- COM DADOS DE FICHEIRO PHP -->
    <table class="table" id="tabela-2">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>&nbsp;</th>
        </thead>
        <tbody id="tbody-2">
        </tbody>
    </table>



    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        /* carregar dados */
        function loadUsers(){
            console.log('vou carregar os dados....');
        }


        setTimeout(loadUsers, 3000);
    </script>
</body>
</html>