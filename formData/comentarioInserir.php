<?php
session_start();
$evento     = $_GET['eventoId'];
$mensagem   = $_GET['mensagem'];
$email      = $_GET['email'];
if(empty($_GET['aceito'])) $email = 'Anónimo';

require('../includes/connection.php');

$sql = 'INSERT INTO comentarios 
        SET email = :email, mensagem = :msg, eventoId = :evento';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':msg', $mensagem);
$stmt->bindValue(':evento', $evento);
$stmt->execute();

if($stmt && $stmt->rowCount() == 1) $_SESSION['comentario=ok'];


header("Location:../evento.php?id=$evento#comentarios");
exit;
