<?php
header('Access-Control-Allow-Origin: *');
session_start();
$foodNeeded = (int)$_GET['foodNeeded'];
if ($_SESSION['town-food'] < $foodNeeded) {
    header('Location: ../map.php');
    exit();
}

$food = $_SESSION['town-food'] - $foodNeeded;
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


$rqt = "UPDATE player set town_food = :food where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':food', $food);
    //On l'execute
    $result = $statement->execute();
    echo ('test avant');
    $_SESSION['town-food'] = $food;
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
