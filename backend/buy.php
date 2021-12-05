<?php

use Models\MySQL;

include_once('Models/MySQL.php');
include_once('Models/Player.php');

if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
$idTransaction = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
$id = $_SESSION['player']->getId();

$rqt = "SELECT * FROM `transaction` WHERE id_transaction = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $idTransaction);

    //On l'execute
    $result = $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    // var_dump($result);
    // die();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

// on vérifie que l'acheteur a l'or nécessaire

$rqt = "SELECT town_gold, town_event_holly FROM town WHERE id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);

    //On l'execute
    $statement->execute();

    $resultInfos = $statement->fetch(PDO::FETCH_ASSOC);
    // var_dump($result);
    // die();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

if ($resultInfos['town_gold'] >= $result['price']) {
    // on soustrait l'or
    // on ajoute le produit acheté
    $newGold = $resultInfos['town_gold'] - $result['price'];
    $newQuantity = $resultInfos['town_event_holly'] + $result['quantity'];
    // echo $newGold;
    // die();

    $rqt = "UPDATE town set town_gold = :quantity, town_event_holly = :quantityProduct WHERE id_player = :id";
    //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
    //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
    try {
        $statement = MySQL::getInstance()->prepare($rqt);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':quantity', $newGold);
        $statement->bindParam(':quantityProduct', $newQuantity);

        //On l'execute
        $statement->execute();
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }

    // on ajoute l'or au vendeur
    $idSeller = $result['id_seller'];

    $rqt = "SELECT town_gold FROM town WHERE id_player = :id";
    //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
    //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
    try {
        $statement = MySQL::getInstance()->prepare($rqt);
        $statement->bindParam(':id', $idSeller);

        //On l'execute
        $statement->execute();
        $resultGold = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }

    $goldSeller = $resultGold['town_gold'];

    $newGoldSeller = $goldSeller + $result['price'];

    $rqt = "UPDATE town set town_gold = :quantity WHERE id_player = :id";
    //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
    //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
    try {
        $statement = MySQL::getInstance()->prepare($rqt);
        $statement->bindParam(':id', $idSeller);
        $statement->bindParam(':quantity', $newGoldSeller);

        //On l'execute
        $result = $statement->execute();
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }

    // on met à jour la transaction

    $rqt = "UPDATE `transaction` set id_buyer = :idBuyer, buying_date = CURRENT_TIME() WHERE id_transaction = :id";
    //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
    //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
    try {
        $statement = MySQL::getInstance()->prepare($rqt);
        $statement->bindParam(':id', $idTransaction);
        $statement->bindParam(':idBuyer', $id);

        //On l'execute
        $statement->execute();
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}
header('Location: ../frontend/map.php');
exit();
