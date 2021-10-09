<?php
header('Access-Control-Allow-Origin: *');
session_start();
$foodEarned = (int)$_GET['foodEarned'];
$woodEarned = (int)$_GET['woodEarned'];
$metalEarned = (int)$_GET['metalEarned'];
$stoneEarned = (int)$_GET['stoneEarned'];
$goldEarned = (int)$_GET['goldEarned'];

echo ('avant test');

include_once('townResourcesRecovering.php');

echo ('après test');

$pseudo = $_SESSION['pseudo'];

$food = $_SESSION['town']['town-food'] + $foodEarned;
$wood = $_SESSION['town']['town-wood'] + $woodEarned;
$metal = $_SESSION['town']['town-metal'] + $metalEarned;
$stone = $_SESSION['town']['town-stone'] + $stoneEarned;
$gold = $_SESSION['town']['town-gold'] + $goldEarned;

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


//met en $_session les valeurs pour le niveau suivant
// include_once('resourcesNeeded.php');

$_SESSION['flash'] = 'Vous avez gagné Nourriture : ' . $foodEarned . ', Bois : ' . $woodEarned . ', Métal : ' . $metalEarned . ', Pierre : ' . $quarryEarned . ', Or : ' . $goldEarned;

header('Location: ../frontend/map.php');
exit();
