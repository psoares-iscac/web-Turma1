<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin / Eventos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
</head>
<body>
    <?php require('includes/connection.php'); //$dbh ?>
    <?php 
    $sql = 'SELECT * FROM eventos 
            WHERE visivel = :v ORDER BY data';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':v', 1);
    $stmt->execute();

    ?>

    <div class="container mt-3 mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php" class="">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Eventos</li>
            </ol>
        </nav>
    </div>
        


   <div class="container display-5">Eventos Activos</div>
   
   <!-- lista de eventos activos -->
   <div class="container">
       <table class="table">
            <thead>
                <tr>
                    <th style="width:4rem;">Id</th>
                    <th style="width:8rem;">Data</th>
                    <th>Nome</th>
                    <th style="width:6rem;">&nbsp;</th>
                    <th style="width:7rem;">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($evento = $stmt->fetchObject()){
                ?>
                    <tr>    
                        <td><?= $evento->id ?></td>
                        <td><?= $evento->data ?></td>
                        <td><?= $evento->nome ?></td>
                        <td>                                
                            <button onclick="showHide(<?= $evento->id ?>, 0)" class="btn btn-danger">Esconder</button>
                        </td>
                        <td>
                            <a href="evento.php?id=<?= $evento->id ?>" class="w-100 btn btn-primary">Editar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
       </table>
   </div>


   <?php 
   $stmt->bindValue(':v', 0);
   $stmt->execute();
   ?>
   <div class="container display-5">Eventos Inactivos</div>
    <!-- lista de eventos inactivos -->
   <div class="container">
       <table class="table">
            <thead>
                <tr>
                    <th style="width:4rem;">Id</th>
                    <th style="width:8rem;">Data</th>
                    <th>Nome</th>
                    <th style="width:6rem;">&nbsp;</th>
                    <th style="width:7rem;">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($evento = $stmt->fetchObject()){
                ?>
                    <tr>    
                        <td><?= $evento->id ?></td>
                        <td><?= $evento->data ?></td>
                        <td><?= $evento->nome ?></td>
                        <td>
                            <button onclick="showHide(<?= $evento->id ?>, 1)" class="btn btn-success">Mostrar</button>
                        </td>
                        <td>
                            <a href="evento.php?id=<?= $evento->id ?>" class="w-100 btn btn-primary">Editar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
       </table>
   </div>                

<script src="js/bootstrap.bundle.min.js"></script>
<script>
    
    /* alterar visibilidade dos eventos */
    function showHide(id, visivel){
        
        let url = 'ajax/showHide.php?id='+id+'&visivel='+visivel;

        fetch(url)
            .then(response => {
                if(!response.ok){
                    throw new Error('Acesso ao ficheiro');
                }
                return response.json();
            })
            .then(data => {
                console.log('Resposta ', data);
                if(data == 'ok'){
                    window.location.href = window.location.href;
                } 
            })
            .catch(error =>{
                console.log('Erro: ', error)
            })

    }
</script>
</body>
</html>