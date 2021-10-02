<?php
session_start();
$foodStock = filter_var($_POST['stock-food'], FILTER_SANITIZE_STRING);
$woodStock = filter_var($_POST['stock-wood'], FILTER_SANITIZE_STRING);
// $resource = 51;
$pseudo = 'Lucie';
// $foodStock = 100;
// $woodStock = 100;

if ($_SESSION['town']['town-food'] < $foodStock || $_SESSION['town']['town-wood'] < $woodStock) {
    header('Location: ../map.php');
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

$rqt = "UPDATE player set town_food = :food, town_wood = :wood where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':food', $newStockFoodTown);
    $statement->bindParam(':wood', $newStockWoodTown);

    //On l'execute
    $result = $statement->execute();
    echo ('test avant');
    //session_destroy();
    // include('connexion.php');
    // echo ('test après');
    $_SESSION['town']['town-food'] = $newStockFoodTown;
    $_SESSION['town']['town-wood'] = $newStockWoodTown;
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

$rqt = "UPDATE player set stock_food = :food, stock_wood = :wood where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':food', $foodStock);
    $statement->bindParam(':wood', $woodStock);

    //On l'execute
    $result = $statement->execute();
    echo ('test avant');
    //session_destroy();
    // include('connexion.php');
    // echo ('test après');
    $_SESSION['stock']['stock-food'] = $foodStock;
    $_SESSION['stock']['stock-wood'] = $woodStock;
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
header('Location: ../map.php');
exit();
