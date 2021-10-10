<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
$foodNeeded = (int)$_GET['foodNeeded'];
$goldNeeded = (int)$_GET['goldNeeded'];
$bowNeeded = (int)$_GET['bowNeeded'];

echo ('avant test');

include_once('townResourcesRecovering.php');

if (
    $_SESSION['town']['town-food'] < $foodNeeded ||
    $_SESSION['town']['town-gold'] < $goldNeeded ||
    $_SESSION['town']['town-bow'] < $bowNeeded
) {
    $_SESSION['flash'] = 'Entraînement annulé car pas assez de ressources en ville';
    header('Location: ../frontend/map.php');
    exit();
}

echo ('après test');

$food = $_SESSION['town']['town-food'] - $foodNeeded;
$gold = $_SESSION['town']['town-gold'] - $goldNeeded;
$bow = $_SESSION['town']['town-bow'] - $bowNeeded;
// $food = (int)$_GET['food'];

$pseudo = $_SESSION['pseudo'];

// $type = 'farm';
// $level = 10;

include_once('db.php');
if (!isset($connexion)) {
    $connexion = new PDO($url, $userDB, $pass);
    // pour afficher les erreurs dans le catch
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}


$rqt = "UPDATE player set town_food = :food, town_gold = :gold, town_bow = :bow where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':food', $food);
    $statement->bindParam(':gold', $gold);
    $statement->bindParam(':bow', $bow);
    //On l'execute
    $result = $statement->execute();
    echo ('test avant');
    $_SESSION['town']['town-food'] = $food;
    $_SESSION['town']['town-gold'] = $gold;
    $_SESSION['town']['town-bow'] = $bow;
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

$_SESSION['flash'] = 'entraînement fini';

header('Location: ../frontend/map.php');
exit();
