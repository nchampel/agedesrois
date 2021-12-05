<?php

use Models\MySQL;
use Models\ManagerGame;
use Models\HandleResources;

include_once('Models/Player.php');
include_once('Models/HandleResources.php');
include_once('Models/MySQL.php');
include_once('Models/ManagerGame.php');

header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
$type = filter_var($_GET['type'], FILTER_SANITIZE_STRING);
$levelConstruct = (int)filter_var($_GET['level'], FILTER_SANITIZE_STRING);
$foodNeeded = (int)filter_var($_GET['foodNeeded'], FILTER_SANITIZE_STRING);
$woodNeeded = (int)filter_var($_GET['woodNeeded'], FILTER_SANITIZE_STRING);
$metalNeeded = (int)filter_var($_GET['metalNeeded'], FILTER_SANITIZE_STRING);
$stoneNeeded = (int)filter_var($_GET['stoneNeeded'], FILTER_SANITIZE_STRING);
$goldNeeded = (int)filter_var($_GET['goldNeeded'], FILTER_SANITIZE_STRING);

if (empty($_SESSION['player'])) {
    // echo ('test');
    header('Location: ../index.php');
    exit();
}

$id = $_SESSION['player']->getId();

// $type = 'farm';
// $level = 10;

/////////////////////////// je peux supprimer le switch en faisant $typeColumn = $type . '_level'

// switch ($type) {
//     case 'castle':
//         $typeColumn = 'castle_level';
//         // $typeLevel = 'castle-level';
//         break;
//     case 'farm':
//         $typeColumn = 'farm_level';
//         // $typeLevel = 'farm-level';
//         break;
//     case 'sawmill':
//         $typeColumn = 'sawmill_level';
//         // $typeLevel = 'sawmill-level';
//         break;
//     case 'extractor':
//         $typeColumn = 'extractor_level';
//         // $typeLevel = 'extractor-level';
//         break;
//     case 'quarry':
//         $typeColumn = 'quarry_level';
//         // $typeLevel = 'quarry-level';
//         break;
//     case 'mine':
//         $typeColumn = 'mine_level';
//         // $typeLevel = 'mine-level';
//         break;
//     case 'barracks':
//         $typeColumn = 'barracks_level';
//         // $typeLevel = 'barracks-level';
//         break;
// case 'workshop':
//     $typeColumn = 'workshop_level';
//     // $typeLevel = 'workshop-level';
//     break;
// case 'archer':
//     $typeColumn = 'archer_level';
//     $typeLevel = 'archer-level';
//     break;
// }

$castleLevel = $_SESSION['player']->getLevel_castle();
$getter = 'getLevel_' . $type;
// $barracksLevel = $_SESSION['barracks-level'];
// var_dump((int)$castleLevel);
// echo ' ';
// var_dump((int)$_SESSION[$typeLevel]);
// echo (int)$castleLevel <= (int)$_SESSION[$typeLevel];

if ((int)$castleLevel <= (int)$_SESSION['player']->$getter() && $type != 'castle') {
    $_SESSION['flash'] = 'Niveau de château insuffisant';
    ManagerGame::createLog($_SESSION['flash'], $id);
    header('Location: ../frontend/map.php');
    exit();
} else if ((int)$castleLevel > (int)$_SESSION['player']->$getter()) {
    $levelConstruct++;
} else if ($type == 'castle') {
    $levelConstruct++;
}

// if ($type == 'archer') {
//     if ((int)$barracksLevel <= (int)$_SESSION['archer-level']) {
//         $_SESSION['flash'] = 'Niveau de caserne insuffisant';
//         header('Location: ../frontend/map.php');
//         exit();
//     }
// }

// if ($type != 'workshop') {
// include_once('constructSubstractResources.php');
HandleResources::substractConstructTown($foodNeeded, $woodNeeded, $metalNeeded, $stoneNeeded, $goldNeeded, $id, $_SESSION['player']);
// } else {
//     HandleResources::substractConstructStock($foodNeeded, $woodNeeded, $metalNeeded, $stoneNeeded, $goldNeeded, $id, $_SESSION['player']);
// }


// include_once('db.php');
// if (!isset($connexion)) {
//     $connexion = new PDO($url, $userDB, $pass);
//     // pour afficher les erreurs dans le catch
//     $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }

$typeColumn = 'level_' . $type;


$rqt = "UPDATE level_constructs_town set " . $typeColumn . "= :level where id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':level', $levelConstruct);
    //On l'execute
    $result = $statement->execute();
    $setter = 'setLevel_' . $type;
    $_SESSION['player']->$setter($levelConstruct);
    // switch ($type) {
    //     case 'castle':
    //         $_SESSION['castle-level'] = $levelConstruct;
    //         break;
    //     case 'farm':
    //         $_SESSION['farm-level'] = $levelConstruct;
    //         break;
    //     case 'sawmill':
    //         $_SESSION['sawmill-level'] = $levelConstruct;
    //         break;
    //     case 'extractor':
    //         $_SESSION['extractor-level'] = $levelConstruct;
    //         break;
    //     case 'quarry':
    //         $_SESSION['quarry-level'] = $levelConstruct;
    //         break;
    //     case 'mine':
    //         $_SESSION['mine-level'] = $levelConstruct;
    //         break;
    //     case 'barracks':
    //         $_SESSION['barracks-level'] = $levelConstruct;
    //         break;
    //     case 'workshop':
    //         $_SESSION['workshop-level'] = $levelConstruct;
    //         break;
    //     case 'archer':
    //         $_SESSION['archer-level'] = $levelConstruct;
    //         break;
    // }

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
// $levelConstruct--;
$_SESSION['flash'] = 'Construction ' . $_SESSION[$type]->getType_item() . ' niveau ' . $levelConstruct . ' finie';
ManagerGame::createLog($_SESSION['flash'], $id);
header('Location: ../frontend/map.php');
exit();
