<?php

use Models\MySQL;
use Models\HandleResources;

include_once('Models/Player.php');
include_once('Models/HandleResources.php');
include_once('Models/MySQL.php');

header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
$levelTraining = (int)filter_var($_GET['level'], FILTER_SANITIZE_STRING);
$foodNeeded = (int)filter_var($_GET['foodNeeded'], FILTER_SANITIZE_STRING);
$goldNeeded = (int)filter_var($_GET['goldNeeded'], FILTER_SANITIZE_STRING);
$bowNeeded = (int)filter_var($_GET['bowNeeded'], FILTER_SANITIZE_STRING);
$type = filter_var($_GET['type'], FILTER_SANITIZE_STRING);
$typeBuilding = filter_var($_GET['typeBuilding'], FILTER_SANITIZE_STRING);

$id = $_SESSION['player']->getId();

// echo ('avant test');

// include_once('townResourcesRecovering.php');

$getterTrainingLevel = 'getLevel_' . $typeBuilding;

$trainingLevel = $_SESSION['player']->$getterTrainingLevel();
$getter = 'getLevel_' . $type;
// $barracksLevel = $_SESSION['barracks-level'];
// var_dump((int)$castleLevel);
// echo ' ';
// var_dump((int)$_SESSION[$typeLevel]);
// echo (int)$castleLevel <= (int)$_SESSION[$typeLevel];

switch ($typeBuilding) {
    case 'archer':
        $nameBuilding = 'caserne';
}

if ((int)$trainingLevel <= (int)$_SESSION['player']->$getter()) {
    $_SESSION['flash'] = 'Niveau de ' . $nameBuilding . ' insuffisant';
    header('Location: ../frontend/map.php');
    exit();
} else if ((int)$trainingLevel > (int)$_SESSION['player']->$getter()) {
    $levelTraining++;
}

HandleResources::substractTraining($foodNeeded, $goldNeeded, $bowNeeded, $id, $_SESSION['player']);


$typeColumn = 'level_' . $type;


$rqt = "UPDATE level_army set " . $typeColumn . "= :level where id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':level', $levelTraining);
    //On l'execute
    $result = $statement->execute();
    $setter = 'setLevel_' . $type;
    $_SESSION['player']->$setter($levelTraining);
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$_SESSION['flash'] = 'Entraînement ' . $_SESSION[$type]->getType_army() . ' fini';

header('Location: ../frontend/map.php');
exit();
