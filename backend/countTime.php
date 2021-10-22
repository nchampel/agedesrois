<?php

use Models\MySQL;

include_once('Models/MySQL.php');

header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}

$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

$rqt = "SELECT game_time FROM player WHERE id = :id";

try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    //On l'execute
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    print_r($result[0]['game_time']);
    $newGameTime = $result[0]['game_time'] + 10;
    $rqt = "UPDATE player set game_time = :gameTime where id = :id";
    //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
    //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
    try {
        $statement = MySQL::getInstance()->prepare($rqt);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':gameTime', $newGameTime);
        //On l'execute
        $result = $statement->execute();
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
