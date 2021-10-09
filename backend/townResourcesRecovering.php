<?php

// use Models\Player;

// include('Models/Player.php');

// if (session_status() != PHP_SESSION_ACTIVE) {

//     session_start();

// }
header('Access-Control-Allow-Origin: *');
session_start();
echo 'test' . $_SESSION['pseudo'];
if (isset($_POST['pseudo'])) {
    $user = filter_var($_POST['pseudo'], FILTER_SANITIZE_STRING);
} else {
    $user = $_SESSION['pseudo'];
}

//$password = $_POST['password'];

include_once('db.php');
if (!isset($connexion)) {
    $connexion = new PDO($url, $userDB, $pass);
    // pour afficher les erreurs dans le catch
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

$rqt = "SELECT * from player where pseudo = :id";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':id', $user);
    //On l'execute
    $statement->execute();
    // On récupère l'ensemble des résultats dans un tableau
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['pseudo'] = $results[0]['pseudo'];
    $_SESSION['town']['town-food'] = $results[0]['town_food'];
    $_SESSION['town']['town-wood'] = $results[0]['town_wood'];
    $_SESSION['town']['town-metal'] = $results[0]['town_metal'];
    $_SESSION['town']['town-stone'] = $results[0]['town_stone'];
    $_SESSION['town']['town-gold'] = $results[0]['town_gold'];
    $_SESSION['town']['town-bow'] = $results[0]['town_bow'];
    $_SESSION['town']['town-crossbow'] = $results[0]['town_crossbow'];
} catch (Exception $exception) {
    echo $exception->getMessage();
}
