<?php
header('Access-Control-Allow-Origin: *');
session_start();
$type = $_GET['type'];
$level = (int)$_GET['level'];
$pseudo = 'Lucie';

// $type = 'farm';
// $level = 10;

$level++;

switch ($type) {
    case 'farm':
        $typeColumn = 'farm_level';
        break;
}

include_once('db.php');
if (!isset($connexion)) {
    $connexion = new PDO($url, $userDB, $pass);
    // pour afficher les erreurs dans le catch
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}


$rqt = "UPDATE player set " . $typeColumn . "= :level where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':level', $level);
    //On l'execute
    $result = $statement->execute();
    switch ($type) {
        case 'farm':
            $_SESSION['farm-level'] = $level;
            break;
    }

    echo ('test avant');
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
