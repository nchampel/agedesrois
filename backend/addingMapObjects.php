<?php

use Models\MySQL;
use Models\HandleResources;

header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}

include_once('Models/MySQL.php');
include_once('Models/HandleResources.php');

// $type = filter_var($_GET['type'], FILTER_SANITIZE_STRING);
$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
$position = filter_var($_GET['position'], FILTER_SANITIZE_STRING);

$rqt = "SELECT position_x, position_y from player where id = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    //On l'execute
    $statement->execute();
    $result = $statement->fetch(\PDO::FETCH_ASSOC);
    $x = $result['position_x'];
    $y = $result['position_y'];
} catch (Exception $exception) {
    echo $exception->getMessage();
}



// $rqt = "SELECT item_quantity from map_item where type_item = :typeItem and position_x = :x and position_y = :y";
$rqt = "SELECT item_quantity, type_item, level_item from map_item where map_position = :position and position_x = :x and position_y = :y";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':x', $x);
    $statement->bindParam(':y', $y);
    // $statement->bindParam(':typeItem', $type);
    $statement->bindParam(':position', $position);
    //On l'execute
    $statement->execute();
    $result = $statement->fetch(\PDO::FETCH_ASSOC);
    $amount = $result['item_quantity'];
    $type = $result['type_item'];
    $level = $result['level_item'];
} catch (Exception $exception) {
    echo $exception->getMessage();
}

switch ($type) {
    case 'buisson':
        switch ($level) {
            case 1:
            case 2:
            case 3:
                $typeDB = 'event_holly'; //houx
                break;
        }

        break;
}
// echo $typeDB;
// die();

$rqt = "SELECT is_active FROM map_player WHERE id_player = :id AND map_position = :position and position_x = :x and position_y = :y";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':x', $x);
    $statement->bindParam(':y', $y);
    $statement->bindParam(':id', $id);
    // $statement->bindParam(':typeItem', $type);
    $statement->bindParam(':position', $position);
    //On l'execute
    $statement->execute();
    $result = $statement->fetch(\PDO::FETCH_ASSOC);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$drawing = rand(1, 20);

if ($result['is_active'] && $drawing == 20) {
    HandleResources::addMapObject($typeDB, $amount, $id);
}


$rqt = "UPDATE map_player set is_active = false, using_date = CURRENT_TIME() where id_player = :id AND position_x = :x and position_y = :y AND map_position = :position";
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':x', $x);
    $statement->bindParam(':y', $y);
    $statement->bindParam(':position', $position);
    //On l'execute
    $result = $statement->execute();
    // echo $amount;
    // $_SESSION['player']->$setter($resource);
} catch (\Exception $exception) {
    echo $exception->getMessage();
}
