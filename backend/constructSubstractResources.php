<?php
header('Access-Control-Allow-Origin: *');
session_start();
$foodNeeded = (int)$_GET['foodNeeded'];
$woodNeeded = (int)$_GET['woodNeeded'];
$metalNeeded = (int)$_GET['metalNeeded'];
$stoneNeeded = (int)$_GET['stoneNeeded'];
$goldNeeded = (int)$_GET['goldNeeded'];

echo ('avant test');

if (
    $_SESSION['town']['town-food'] < $foodNeeded ||
    $_SESSION['town']['town-wood'] < $woodNeeded ||
    $_SESSION['town']['town-metal'] < $metalNeeded ||
    $_SESSION['town']['town-stone'] < $stoneNeeded ||
    $_SESSION['town']['town-gold'] < $goldNeeded
) {
    $_SESSION['flash'] = 'Construction annulée car pas assez de ressources en ville';
    header('Location: ../frontend/map.php');
    exit();
}

echo ('après test');

$food = $_SESSION['town']['town-food'] - $foodNeeded;
$wood = $_SESSION['town']['town-wood'] - $woodNeeded;
$metal = $_SESSION['town']['town-metal'] - $metalNeeded;
$stone = $_SESSION['town']['town-stone'] - $stoneNeeded;
$gold = $_SESSION['town']['town-gold'] - $goldNeeded;
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


$rqt = "UPDATE player set town_food = :food, town_wood = :wood, town_metal = :metal, town_stone = :stone, town_gold = :gold where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':food', $food);
    $statement->bindParam(':wood', $wood);
    $statement->bindParam(':metal', $metal);
    $statement->bindParam(':stone', $stone);
    $statement->bindParam(':gold', $gold);
    //On l'execute
    $result = $statement->execute();
    echo ('test avant');
    $_SESSION['town']['town-food'] = $food;
    $_SESSION['town']['town-wood'] = $wood;
    $_SESSION['town']['town-metal'] - $metal;
    $_SESSION['town']['town-stone'] = $stone;
    $_SESSION['town']['town-gold'] = $gold;
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

$_SESSION['flash'] = 'construction finie';

header('Location: ../frontend/map.php');
exit();
