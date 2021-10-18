<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
$foodNeeded = (int)$_GET['foodNeeded'];
$woodNeeded = (int)$_GET['woodNeeded'];
$metalNeeded = (int)$_GET['metalNeeded'];
$stoneNeeded = (int)$_GET['stoneNeeded'];
$goldNeeded = (int)$_GET['goldNeeded'];

// echo ('avant test');

include_once('stockResourcesRecovering.php');

// var_dump($woodNeeded);

if (
    $_SESSION['stock']['stock-food'] < $foodNeeded ||
    $_SESSION['stock']['stock-wood'] < $woodNeeded ||
    $_SESSION['stock']['stock-metal'] < $metalNeeded ||
    $_SESSION['stock']['stock-stone'] < $stoneNeeded ||
    $_SESSION['stock']['stock-gold'] < $goldNeeded
) {
    $_SESSION['flash'] = 'Construction annulée car pas assez de ressources en stock';
    header('Location: ../frontend/map.php');
    exit();
}

echo ('après test');

$food = $_SESSION['stock']['stock-food'] - $foodNeeded;
$wood = $_SESSION['stock']['stock-wood'] - $woodNeeded;
$metal = $_SESSION['stock']['stock-metal'] - $metalNeeded;
$stone = $_SESSION['stock']['stock-stone'] - $stoneNeeded;
$gold = $_SESSION['stock']['stock-gold'] - $goldNeeded;
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
    $_SESSION['stock']['stock-food'] = $food;
    $_SESSION['stock']['stock-wood'] = $wood;
    $_SESSION['stock']['stock-metal'] = $metal;
    $_SESSION['stock']['stock-stone'] = $stone;
    $_SESSION['stock']['stock-gold'] = $gold;
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

//met en $_session les valeurs pour le niveau suivant
include_once('resourcesNeeded.php');

$_SESSION['flash'] = 'Construction finie';

// header('Location: ../frontend/map.php');
// exit();.
include_once('construct.php');
