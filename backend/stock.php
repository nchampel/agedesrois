<?php

use Models\MySQL;
use Models\ManagerGame;
use Models\HandleResources;

include_once('Models/Player.php');
include_once('Models/HandleResources.php');
include_once('Models/MySQL.php');
include_once('Models/ManagerGame.php');

if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
$foodStock = filter_var($_POST['transfer-food'], FILTER_SANITIZE_STRING);
$woodStock = filter_var($_POST['transfer-wood'], FILTER_SANITIZE_STRING);
$metalStock = filter_var($_POST['transfer-metal'], FILTER_SANITIZE_STRING);
$stoneStock = filter_var($_POST['transfer-stone'], FILTER_SANITIZE_STRING);
$goldStock = filter_var($_POST['transfer-gold'], FILTER_SANITIZE_STRING);
// $resource = 51;
$id = $_SESSION['player']->getId();
// $foodStock = 100;
// $woodStock = 100;

// include_once('townResourcesRecovering.php');
HandleResources::townResourcesRecovering($id, $_SESSION['player']);

if (
    $_SESSION['player']->getTown_food() < $foodStock ||
    $_SESSION['player']->getTown_wood() < $woodStock ||
    $_SESSION['player']->getTown_metal() < $metalStock ||
    $_SESSION['player']->getTown_stone() < $stoneStock ||
    $_SESSION['player']->getTown_gold() < $goldStock
) {

    $_SESSION['flash'] = 'Mise en stock annulée car pas assez de ressources en ville';
    ManagerGame::createLog($_SESSION['flash'], $id);
    header('Location: ../frontend/map.php');
    exit();
}

// on soustrait les ressources à la ville

$newStockFoodTown = $_SESSION['player']->getTown_food() - $foodStock;
$newStockWoodTown = $_SESSION['player']->getTown_wood() - $woodStock;
$newStockMetalTown = $_SESSION['player']->getTown_metal() - $metalStock;
$newStockStoneTown = $_SESSION['player']->getTown_stone() - $stoneStock;
$newStockGoldTown = $_SESSION['player']->getTown_gold() - $goldStock;

$rqt = "UPDATE town set town_food = :food, town_wood = :wood, town_metal = :metal, town_stone = :stone, town_gold = :gold where id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':food', $newStockFoodTown);
    $statement->bindParam(':wood', $newStockWoodTown);
    $statement->bindParam(':metal', $newStockMetalTown);
    $statement->bindParam(':stone', $newStockStoneTown);
    $statement->bindParam(':gold', $newStockGoldTown);

    //On l'execute
    $result = $statement->execute();
    // echo ('test avant');
    //session_destroy();
    // include('connexion.php');
    // echo ('test après');
    $_SESSION['player']->setTown_food($newStockFoodTown);
    $_SESSION['player']->setTown_wood($newStockWoodTown);
    $_SESSION['player']->setTown_metal($newStockMetalTown);
    $_SESSION['player']->setTown_stone($newStockStoneTown);
    $_SESSION['player']->setTown_gold($newStockGoldTown);

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

// on ajoute les ressources au stock

$foodStock = $_SESSION['player']->getStock_food() + $foodStock;
$woodStock = $_SESSION['player']->getStock_wood() + $woodStock;
$metalStock = $_SESSION['player']->getStock_metal() + $metalStock;
$stoneStock = $_SESSION['player']->getStock_stone() + $stoneStock;
$goldStock = $_SESSION['player']->getStock_gold() + $goldStock;

$rqt = "UPDATE stock set stock_food = :food, stock_wood = :wood, stock_metal = :metal, stock_stone = :stone, stock_gold = :gold where id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':food', $foodStock);
    $statement->bindParam(':wood', $woodStock);
    $statement->bindParam(':metal', $metalStock);
    $statement->bindParam(':stone', $stoneStock);
    $statement->bindParam(':gold', $goldStock);

    //On l'execute
    $result = $statement->execute();
    // echo ('test avant');
    //session_destroy();
    // include('connexion.php');
    // echo ('test après');
    // $_SESSION['stock']['stock-food'] = $foodStock;
    // $_SESSION['stock']['stock-wood'] = $woodStock;
    // $_SESSION['stock']['stock-metal'] = $metalStock;
    // $_SESSION['stock']['stock-stone'] = $stoneStock;
    // $_SESSION['stock']['stock-gold'] = $goldStock;

    $_SESSION['player']->setStock_food($foodStock);
    $_SESSION['player']->setStock_wood($woodStock);
    $_SESSION['player']->setStock_metal($metalStock);
    $_SESSION['player']->setStock_stone($stoneStock);
    $_SESSION['player']->setStock_gold($goldStock);
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

$_SESSION['flash'] = 'Mise en stock effectuée';
ManagerGame::createLog($_SESSION['flash'], $id);
// var_dump($_SESSION);



//header('Content-type: text/plain');
//echo json_encode('php');
//echo $result;
header('Location: ../frontend/map.php');
exit();
