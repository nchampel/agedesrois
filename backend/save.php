<?php

use Models\MySQL;

include_once('Models/MySQL.php');

header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
// print_r($_SESSION);
$resource = (int)filter_var($_GET['resource'], FILTER_SANITIZE_STRING);
// $resource = $_GET['resource'];
$type = filter_var($_GET['type'], FILTER_SANITIZE_STRING);
$building = filter_var($_GET['building'], FILTER_SANITIZE_STRING);
// $resource = 51;
// $pseudo = $_SESSION['pseudo'];
// $pseudo = 'Lucie';
$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

switch ($building) {
    case 'farm':
        $multiplicator = 5;
        break;
    case 'sawmill':
        $multiplicator = 4;
        break;
    case 'extractor':
        $multiplicator = 3;
        break;
    case 'quarry':
        $multiplicator = 2;
        break;
    case 'mine':
        $multiplicator = 1;
        break;
    case 'workshop':
        $multiplicator = 1;
        break;
}

$typeColumn = 'town_' . $type;
$setter = 'setTown_' . $type;

$rqt = "SELECT " . $typeColumn . " FROM town where id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    //On l'execute
    $result = $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);
    // die();
    //$result = $statement->getAttribute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$levelColumn = 'level_' . $building;

switch ($type) {
    case 'food':
    case 'wood':
    case 'metal':
    case 'stone':
    case 'gold':
        $table = 'level_constructs_town';
        break;
    case 'bow':
    case 'crossbow':
        $table = 'level_constructs_stock';
        break;
}

$rqt = "SELECT " . $levelColumn . " FROM " . $table . " where id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    //On l'execute
    $result1 = $statement->execute();

    $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    $level = $result1[0][$levelColumn];
    // var_dump($result);
    // die();
    //$result = $statement->getAttribute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
if ($type == 'food' || $type = 'wood') {
    if (($resource - $result[0][$typeColumn]) <= ($multiplicator * $level + 1)) {
        $rqt = "UPDATE town set " . $typeColumn . " = :resource where id_player = :id";
        //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
        //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':resource', $resource);
            //On l'execute
            $result = $statement->execute();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
} else if ($type == 'metal' || $type = 'stone' || $type = 'gold' || $type = 'bow' || $type = 'crossbow') {
    if (($resource - $result[0][$typeColumn]) <= ($multiplicator * $level)) {
        $rqt = "UPDATE town set " . $typeColumn . " = :resource where id_player = :id";
        //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
        //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':resource', $resource);
            //On l'execute
            $result = $statement->execute();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}


// $rqt = "UPDATE town set " . $typeColumn . " = :resource where id_player = :id";
// //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
// //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
// try {
//     $statement = MySQL::getInstance()->prepare($rqt);
//     $statement->bindParam(':id', $id);
//     $statement->bindParam(':resource', $resource);
//     //On l'execute
//     $result = $statement->execute();
//     // echo ('test avant');
//     //session_destroy();
//     // include('connexion.php');
//     // echo ('test après');
//     // unset($_SESSION['town-food']);
//     // $_SESSION['town-food'] = $_GET['resource'];
//     // $_SESSION['town-food'] = $resource;
//     // switch ($type) {
//     //     case 'food':
//     //         $_SESSION['town']['town-food'] = $resource;
//     //         break;
//     //     case 'wood':
//     //         $_SESSION['town']['town-wood'] = $resource;
//     //         break;
//     //     case 'metal':
//     //         $_SESSION['town']['town-metal'] = $resource;
//     //         break;
//     //     case 'stone':
//     //         $_SESSION['town']['town-stone'] = $resource;
//     //         break;
//     //     case 'gold':
//     //         $_SESSION['town']['town-gold'] = $resource;
//     //         break;
//     //     case 'bow':
//     //         $_SESSION['town']['town-bow'] = $resource;
//     //         break;
//     //     case 'crossbow':
//     //         $_SESSION['town']['town-crossbow'] = $resource;
//     //         break;
//     // }
//     // $_SESSION['player']->$setter($resource); //souci, cela ne fonctionne pas
//     // echo ('food');
//     // echo ($_SESSION['town-food']);
//     // header('Location: ../index.php');
//     // exit();
//     // On récupère l'ensemble des résultats dans un tableau
//     //$results = $statement->fetchAll(PDO::FETCH_ASSOC);
//     //$result = $statement->getAttribute();
// } catch (Exception $exception) {
//     echo $exception->getMessage();
// }
//header('Content-type: text/plain');
//echo json_encode('php');
//echo $result;
// echo (PHP_EOL);
// echo $result;
