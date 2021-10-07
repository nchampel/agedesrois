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
    $_SESSION['stock']['stock-food'] = $results[0]['stock_food'];
    $_SESSION['stock']['stock-wood'] = $results[0]['stock_wood'];
    $_SESSION['stock']['stock-metal'] = $results[0]['stock_metal'];
    $_SESSION['stock']['stock-stone'] = $results[0]['stock_stone'];
    $_SESSION['stock']['stock-gold'] = $results[0]['stock_gold'];
    $_SESSION['farm-level'] = $results[0]['farm_level'];
    $_SESSION['sawmill-level'] = $results[0]['sawmill_level'];
    $_SESSION['extractor-level'] = $results[0]['extractor_level'];
    $_SESSION['quarry-level'] = $results[0]['quarry_level'];
    $_SESSION['mine-level'] = $results[0]['mine_level'];
    $_SESSION['workshop-level'] = $results[0]['workshop_level'];
    $_SESSION['archer-level'] = $results[0]['archer_level'];
} catch (Exception $exception) {
    echo $exception->getMessage();
}

//On compare les mots avec la fonction password_verify
//if (password_verify($password, $results[0]['mot_de_passe'])) { // si vrai le mot de passe correspond au $hash
// On vient de récupérer l'utilisateur, on créé sa session
//    session_start();
//    $_SESSION['id_user'] = $results[0]['adherent_id']; // les variable de session sont stockées dans le tableau super global $_SESSION

//    header('Location: ../frontend/edit-profile.php');
//    exit();


include_once('resourcesNeeded.php');

//http_response_code(200);
//} else { // Sinon, on redirige vers index.html pour qu'il retente de se connecter. 
//     http_response_code(401); // Non autorisé
//     header('Location: ../frontend/index.html');
//     exit();
// }

var_dump($_SESSION['town-food']);



// echo ('connexion');
// echo $_SESSION['town-food'];
// $player = new Player();
// $_SESSION['player'] = $player;
// $player->setPseudo($results[0]['pseudo']);
// $player->setTownFood($results[0]['town_food']);

header('Location: ../frontend/map.php');
exit();
