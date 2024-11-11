<?php
$user = 'web';
$pass = 'web';
$dbase = 'web1';

try {
    $dbh = new PDO('mysql:host=localhost;dbname='.$dbase.';charset=utf8', $user, $pass);
} catch (PDOException $e) {
    // attempt to retry the connection after some timeout for example
    //echo $e;
}

?>