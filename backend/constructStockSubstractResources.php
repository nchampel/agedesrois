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
    $_SESSION['stock']['town-food'] < $foodNeeded ||
    $_SESSION['stock']['town-wood'] < $woodNeeded ||
    $_SESSION['stock']['town-metal'] < $metalNeeded ||
    $_SESSION['stock']['town-stone'] < $stoneNeeded ||
    $_SESSION['stock']['town-gold'] < $goldNeeded
) {
    header('Location: ../frontend/map.php');
    exit();
}

echo ('après test');

$food = $_SESSION['stock']['town-food'] - $foodNeeded;
$wood = $_SESSION['stock']['town-wood'] - $woodNeeded;
$metal = $_SESSION['stock']['town-metal'] - $metalNeeded;
$stone = $_SESSION['stock']['town-stone'] - $stoneNeeded;
$gold = $_SESSION['stock']['town-gold'] - $goldNeeded;
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


$rqt = "UPDATE player set stock_food = :food, stock_wood = :wood, stock_metal = :metal, stock_stone = :stone, stock_gold = :gold where pseudo = :pseudo";
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
    $_SESSION['stock']['town-food'] = $food;
    $_SESSION['stock']['town-wood'] = $wood;
    $_SESSION['stock']['town-metal'] - $metal;
    $_SESSION['stock']['town-stone'] = $stone;
    $_SESSION['stock']['town-gold'] = $gold;
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
