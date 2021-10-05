<?php
header('Access-Control-Allow-Origin: *');
session_start();
$resource = $_GET['resource'];
$type = $_GET['type'];
// $resource = 51;
$pseudo = $_SESSION['pseudo'];
$pseudo = 'Lucie';

switch ($type) {
    case 'food':
        $typeColumn = 'town_food';
        break;
    case 'wood':
        $typeColumn = 'town_wood';
        break;
    case 'metal':
        $typeColumn = 'town_metal';
        break;
    case 'stone':
        $typeColumn = 'town_stone';
        break;
    case 'gold':
        $typeColumn = 'town_gold';
        break;
    case 'bow':
        $typeColumn = 'town_bow';
        break;
    case 'crossbow':
        $typeColumn = 'town_crossbow';
        break;
}

include_once('db.php');
if (!isset($connexion)) {
    $connexion = new PDO($url, $userDB, $pass);
    // pour afficher les erreurs dans le catch
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

$rqt = "UPDATE player set " . $typeColumn . " = :resource where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':resource', $resource);
    //On l'execute
    $result = $statement->execute();
    echo ('test avant');
    //session_destroy();
    // include('connexion.php');
    // echo ('test après');
    // unset($_SESSION['town-food']);
    // $_SESSION['town-food'] = $_GET['resource'];
    // $_SESSION['town-food'] = $resource;
    switch ($type) {
        case 'food':
            $_SESSION['town']['town-food'] = $resource;
            break;
        case 'wood':
            $_SESSION['town']['town-wood'] = $resource;
            break;
        case 'metal':
            $_SESSION['town']['town-metal'] = $resource;
            break;
        case 'stone':
            $_SESSION['town']['town-stone'] = $resource;
            break;
        case 'gold':
            $_SESSION['town']['town-gold'] = $resource;
            break;
        case 'bow':
            $_SESSION['town']['town-bow'] = $resource;
            break;
        case 'crossbow':
            $_SESSION['town']['town-crossbow'] = $resource;
            break;
    }
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
//header('Content-type: text/plain');
//echo json_encode('php');
//echo $result;
echo (PHP_EOL);
echo $result;
