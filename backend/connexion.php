<?php

// use Models\Player;

// include('Models/Player.php');

// if (session_status() != PHP_SESSION_ACTIVE) {

//     session_start();

// }
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
// echo 'test' . $_SESSION['pseudo'];
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

include_once('infosPlayerRequest.php');

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
