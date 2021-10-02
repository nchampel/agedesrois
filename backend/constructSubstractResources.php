<?php
header('Access-Control-Allow-Origin: *');
session_start();
$foodNeeded = (int)$_GET['foodNeeded'];
$woodNeeded = (int)$_GET['woodNeeded'];
if ($_SESSION['town-food'] < $foodNeeded || $_SESSION['town-wood'] < $woodNeeded) {
    header('Location: ../map.php');
    exit();
}

$food = $_SESSION['town-food'] - $foodNeeded;
$wood = $_SESSION['town-wood'] - $woodNeeded;
// $food = (int)$_GET['food'];

$pseudo = 'Lucie';

// $type = 'farm';
// $level = 10;

include_once('db.php');
if (!isset($connexion)) {
    $connexion = new PDO($url, $userDB, $pass);
    // pour afficher les erreurs dans le catch
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}


$rqt = "UPDATE player set town_food = :food, town_wood = :wood where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':food', $food);
    $statement->bindParam(':wood', $wood);
    //On l'execute
    $result = $statement->execute();
    echo ('test avant');
    $_SESSION['town-food'] = $food;
    $_SESSION['town-wood'] = $wood;
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

// sleep(10);
include_once('construct.php');
//met en $_session les valeurs pour le niveau suivant
include_once('resourcesNeeded.php');

header('Location: ../map.php');
exit();
