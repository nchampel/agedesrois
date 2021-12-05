<?php

use Models\MySQL;

include_once('Models/MySQL.php');
include_once('Models/Player.php');

if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
$price = filter_var($_POST['holly-price'], FILTER_SANITIZE_STRING);
$type = "houx";
$quantity = 1;
$id = $_SESSION['player']->getId();

$rqt = "INSERT INTO `transaction` (id_seller, article_type, quantity, price, selling_date) VALUES (:id, :typeSelling, :quantity, :price, CURRENT_TIME())";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':typeSelling', $type);
    $statement->bindParam(':quantity', $quantity);
    $statement->bindParam(':price', $price);

    //On l'execute
    $result = $statement->execute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$rqt = "SELECT town_event_holly FROM town WHERE id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);

    //On l'execute
    $result = $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    // var_dump($result);
    // die();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$newQuantity = $result['town_event_holly'] - $quantity;

$rqt = "UPDATE town set town_event_holly = :quantity WHERE id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':quantity', $newQuantity);

    //On l'execute
    $result = $statement->execute();
    // echo ('test avant');
    //session_destroy();
    // include('connexion.php');
    // echo ('test après');


    // $_SESSION['town-food'] = $resource;
    // echo ('food');
    // echo ($_SESSION['town-food']);
    // header('Location: ../index.php');
    // exit();
    // On récupère l'ensemble des résultats dans un tableau
    //$results = $statement->fetchAll(PDO::FETCH_ASSOC);
    //$result = $statement->getAttribute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
header('Location: ../frontend/map.php');
exit();
