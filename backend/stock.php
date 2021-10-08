<?php
session_start();
$foodStock = filter_var($_POST['transfer-food'], FILTER_SANITIZE_STRING);
$woodStock = filter_var($_POST['transfer-wood'], FILTER_SANITIZE_STRING);
$metalStock = filter_var($_POST['transfer-metal'], FILTER_SANITIZE_STRING);
$stoneStock = filter_var($_POST['transfer-stone'], FILTER_SANITIZE_STRING);
$goldStock = filter_var($_POST['transfer-gold'], FILTER_SANITIZE_STRING);
// $resource = 51;
$pseudo = $_SESSION['pseudo'];
// $foodStock = 100;
// $woodStock = 100;

if (
    $_SESSION['town']['town-food'] < $foodStock ||
    $_SESSION['town']['town-wood'] < $woodStock ||
    $_SESSION['town']['town-metal'] < $metalStock ||
    $_SESSION['town']['town-stone'] < $stoneStock ||
    $_SESSION['town']['town-gold'] < $goldStock
) {

    $_SESSION['flash'] = 'Mise en stock annulée car pas assez de ressources en ville';
    header('Location: ../frontend/map.php');
    exit();
}

// on soustrait les ressources à la ville

include_once('db.php');
if (!isset($connexion)) {
    $connexion = new PDO($url, $userDB, $pass);
    // pour afficher les erreurs dans le catch
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

$newStockFoodTown = $_SESSION['town']['town-food'] - $foodStock;
$newStockWoodTown = $_SESSION['town']['town-wood'] - $woodStock;
$newStockMetalTown = $_SESSION['town']['town-metal'] - $metalStock;
$newStockStoneTown = $_SESSION['town']['town-stone'] - $stoneStock;
$newStockGoldTown = $_SESSION['town']['town-gold'] - $goldStock;

$rqt = "UPDATE player set town_food = :food, town_wood = :wood, town_metal = :metal, town_stone = :stone, town_gold = :gold where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':food', $newStockFoodTown);
    $statement->bindParam(':wood', $newStockWoodTown);
    $statement->bindParam(':metal', $newStockMetalTown);
    $statement->bindParam(':stone', $newStockStoneTown);
    $statement->bindParam(':gold', $newStockGoldTown);

    //On l'execute
    $result = $statement->execute();
    echo ('test avant');
    //session_destroy();
    // include('connexion.php');
    // echo ('test après');
    $_SESSION['town']['town-food'] = $newStockFoodTown;
    $_SESSION['town']['town-wood'] = $newStockWoodTown;
    $_SESSION['town']['town-metal'] = $newStockMetalTown;
    $_SESSION['town']['town-stone'] = $newStockStoneTown;
    $_SESSION['town']['town-gold'] = $newStockGoldTown;

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

// on ajoute les ressources au stock

$foodStock = $_SESSION['stock']['stock-food'] + $foodStock;
$woodStock = $_SESSION['stock']['stock-wood'] + $woodStock;
$metalStock = $_SESSION['stock']['stock-metal'] + $metalStock;
$stoneStock = $_SESSION['stock']['stock-stone'] + $stoneStock;
$goldStock = $_SESSION['stock']['stock-gold'] + $goldStock;

$rqt = "UPDATE player set stock_food = :food, stock_wood = :wood, stock_metal = :metal, stock_stone = :stone, stock_gold = :gold where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':food', $foodStock);
    $statement->bindParam(':wood', $woodStock);
    $statement->bindParam(':metal', $metalStock);
    $statement->bindParam(':stone', $stoneStock);
    $statement->bindParam(':gold', $goldStock);

    //On l'execute
    $result = $statement->execute();
    echo ('test avant');
    //session_destroy();
    // include('connexion.php');
    // echo ('test après');
    $_SESSION['stock']['stock-food'] = $foodStock;
    $_SESSION['stock']['stock-wood'] = $woodStock;
    $_SESSION['stock']['stock-metal'] = $metalStock;
    $_SESSION['stock']['stock-stone'] = $stoneStock;
    $_SESSION['stock']['stock-gold'] = $goldStock;
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

$_SESSION['flash'] = 'Mise en stock effectuée';

var_dump($_SESSION);



//header('Content-type: text/plain');
//echo json_encode('php');
//echo $result;
header('Location: ../frontend/map.php');
exit();
