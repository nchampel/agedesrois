<?php

use Models\MySQL;

header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}

include_once('Models/MySQL.php');

$view = filter_var($_GET['view'], FILTER_SANITIZE_STRING);
$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

$rqt = "UPDATE player set view = :view where id = :id";
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':view', $view);
    //On l'execute
    $result = $statement->execute();
    // echo $amount;
    // $_SESSION['player']->$setter($resource);
} catch (Exception $exception) {
    echo $exception->getMessage();
}
