<?php

use Models\MySQL;

header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}

include_once('Models/MySQL.php');

$resourcesEarned = ['foodEarned', 'woodEarned', 'metalEarned', 'stoneEarned', 'goldEarned', 'toolEarned'];

foreach ($resourcesEarned as $resourceEarned) {
    switch ($resourceEarned) {
        case 'foodEarned':
            if (isset($_GET[$resourceEarned])) {
                $foodEarned = (int)$_GET[$resourceEarned];
            } else {
                $foodEarned = 0;
            }
            break;
        case 'woodEarned':
            if (isset($_GET[$resourceEarned])) {
                $woodEarned = (int)$_GET[$resourceEarned];
            } else {
                $woodEarned = 0;
            }
            break;
        case 'metalEarned':
            if (isset($_GET[$resourceEarned])) {
                $metalEarned = (int)$_GET[$resourceEarned];
            } else {
                $metalEarned = 0;
            }
            break;
        case 'stoneEarned':
            if (isset($_GET[$resourceEarned])) {
                $stoneEarned = (int)$_GET[$resourceEarned];
            } else {
                $stoneEarned = 0;
            }
            break;
        case 'goldEarned':
            if (isset($_GET[$resourceEarned])) {
                $goldEarned = (int)$_GET[$resourceEarned];
            } else {
                $goldEarned = 0;
            }
            break;
        case 'toolEarned':
            if (isset($_GET[$resourceEarned])) {
                $toolEarned = (int)$_GET[$resourceEarned];
            } else {
                $toolEarned = 0;
            }
            break;
    }
}


// $foodEarned = (int)$_GET['foodEarned'];
// $woodEarned = (int)$_GET['woodEarned'];
// $metalEarned = (int)$_GET['metalEarned'];
// $stoneEarned = (int)$_GET['stoneEarned'];
// $goldEarned = (int)$_GET['goldEarned'];

echo ('avant test');

include_once('townResourcesRecovering.php');

echo ('apr??s test');

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
//On pr??pare notre requ??te. ??a nous renvoie un objet qui est notre requ??te pr??par??e pr??te ?? ??tre execut??e
try {
    $statement = MySQL::getInstance()->prepare($rqt);
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
    $_SESSION['town']['town-metal'] = $metal;
    $_SESSION['town']['town-stone'] = $stone;
    $_SESSION['town']['town-gold'] = $gold;
    //session_destroy();
    // include('connexion.php');
    // echo ('test apr??s');

    // $_SESSION['town-food'] = $resource;
    // echo ('food');
    // echo ($_SESSION['town-food']);
    // header('Location: ../index.php');
    // exit();
    // On r??cup??re l'ensemble des r??sultats dans un tableau
    //$results = $statement->fetchAll(PDO::FETCH_ASSOC);
    //$result = $statement->getAttribute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}


//met en $_session les valeurs pour le niveau suivant
// include_once('resourcesNeeded.php');

$_SESSION['flash'] = 'Vous avez gagn?? Nourriture : ' . $foodEarned . ', Bois : ' . $woodEarned . ', M??tal : ' . $metalEarned . ', Pierre : ' . $quarryEarned . ', Or : ' . $goldEarned;

header('Location: ../frontend/map.php');
exit();
