<?php
$idEvento = $_GET['id'];
$valor    = $_GET['visivel'];

require('../includes/connection.php');
$sql = 'UPDATE eventos SET visivel = :v WHERE id = :i';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':v', $valor);
$stmt->bindValue(':i', $idEvento);
$stmt->execute();

if($stmt && $stmt->rowCount() == 1){
    echo json_encode('ok');
}else{
    echo json_encode('uma desgraça!!!');
}
die();


