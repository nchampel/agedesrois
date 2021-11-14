<?php

use Models\InitGame;
use Models\MySQL;

// include('Models/Player.php');

// if (session_status() != PHP_SESSION_ACTIVE) {

//     session_start();

// }
header('Access-Control-Allow-Origin: *');

include_once('Models/MySQL.php');
include_once('Models/InitGame.php');
include_once('Models/ManagerPlayer.php');
include_once('Models/ManagerItems.php');
include_once('Models/ManagerArmy.php');
include_once('Models/Player.php');
include_once('Models/Constructs/Farm.php');
include_once('Models/Constructs/Castle.php');
include_once('Models/Constructs/Extractor.php');
include_once('Models/Constructs/Mine.php');
include_once('Models/Constructs/Quarry.php');
include_once('Models/Constructs/Sawmill.php');
include_once('Models/Constructs/Barracks.php');
include_once('Models/Constructs/Workshop.php');
include_once('Models/Army/Archer.php');

// Affichage des messages d'erreurs
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

// if (session_status() != PHP_SESSION_ACTIVE) {
//     //var_dump('test');
//     session_start();
//     //$_SESSION['pseudo'] = "Lucie";
// }
// $_POST['pseudo'] = 'Lucie';
// echo 'test' . $_SESSION['pseudo'];
if (isset($_POST['pseudo'])) {
    $pseudo = filter_var($_POST['pseudo'], FILTER_SANITIZE_STRING);
} else {
    $pseudo = $_SESSION['pseudo'];
}

$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

//$password = $_POST['password'];

// include_once('db.php');
// if (!isset($connexion)) {
//     $connexion = new PDO($url, $userDB, $pass);
//     // pour afficher les erreurs dans le catch
//     $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }

$req = "SELECT * from player where pseudo = :pseudo";
try {

    $cnx = MySQL::getInstance();

    $statement = $cnx->prepare($req);

    $statement->bindParam(':pseudo', $pseudo);

    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    // print_r($results[0]['id']);
    // die();

    if (password_verify($password, $results[0]['player_password'])) { // si vrai le mot de passe correspond au $hash
        // On vient de récupérer l'utilisateur, on créé sa session
        session_start();
        // $user = new Player($results[0]['id'], $results[0]['pseudo']);
        // print_r($results);
        InitGame::initialization($results);
        InitGame::mapInitialization($results[0]['id']);
        // $player = ManagerPlayer::playerLoading($results[0]['id']);
        // $_SESSION['player'] = $player;
        // $farm = ManagerItems::itemLoading($_SESSION['player']->getLevel_farm(), 'ferme');
        // $_SESSION['farm'] = $farm;
        // $castle = ManagerItems::itemLoading($_SESSION['player']->getLevel_castle(), 'chateau');
        // $_SESSION['castle'] = $castle;
        // $sawmill = ManagerItems::itemLoading(
        //     $_SESSION['player']->getLevel_sawmill(),
        //     'scierie'
        // );
        // $_SESSION['sawmill'] = $sawmill;
        // $extractor = ManagerItems::itemLoading(
        //     $_SESSION['player']->getLevel_extractor(),
        //     'extracteur'
        // );
        // $_SESSION['extractor'] = $extractor;
        // $quarry = ManagerItems::itemLoading(
        //     $_SESSION['player']->getLevel_quarry(),
        //     'carriere'
        // );
        // $_SESSION['quarry'] = $quarry;
        // $mine = ManagerItems::itemLoading(
        //     $_SESSION['player']->getLevel_mine(),
        //     'mine'
        // );
        // $_SESSION['mine'] = $mine;
        // $barracks = ManagerItems::itemLoading(
        //     $_SESSION['player']->getLevel_barracks(),
        //     'caserne'
        // );
        // $_SESSION['barracks'] = $barracks;
        // $workshop = ManagerItems::itemLoading(
        //     $_SESSION['player']->getLevel_workshop(),
        //     'atelier'
        // );
        // $_SESSION['workshop'] = $workshop;

        // $archer = ManagerArmy::armyLoading(
        //     $_SESSION['player']->getLevel_archer(),
        //     'archer'
        // );
        // $_SESSION['archer'] = $archer;



        // $_SESSION['pseudo'] = $user->getPseudo(); // les variable de session sont stockées dans le tableau super global $_SESSION
        // $_SESSION['town']['town-food'] = $results[0]['town_food'];
        // $_SESSION['town']['town-wood'] = $results[0]['town_wood'];
        // $_SESSION['town']['town-metal'] = $results[0]['town_metal'];
        // $_SESSION['town']['town-stone'] = $results[0]['town_stone'];
        // $_SESSION['town']['town-gold'] = $results[0]['town_gold'];
        // $_SESSION['town']['town-bow'] = $results[0]['town_bow'];
        // $_SESSION['town']['town-crossbow'] = $results[0]['town_crossbow'];
        // $_SESSION['stock']['stock-food'] = $results[0]['stock_food'];
        // $_SESSION['stock']['stock-wood'] = $results[0]['stock_wood'];
        // $_SESSION['stock']['stock-metal'] = $results[0]['stock_metal'];
        // $_SESSION['stock']['stock-stone'] = $results[0]['stock_stone'];
        // $_SESSION['stock']['stock-gold'] = $results[0]['stock_gold'];
        // $_SESSION['castle-level'] = $results[0]['castle_level'];
        // $_SESSION['farm-level'] = $results[0]['farm_level'];
        // $_SESSION['sawmill-level'] = $results[0]['sawmill_level'];
        // $_SESSION['extractor-level'] = $results[0]['extractor_level'];
        // $_SESSION['quarry-level'] = $results[0]['quarry_level'];
        // $_SESSION['mine-level'] = $results[0]['mine_level'];
        // $_SESSION['barracks-level'] = $results[0]['barracks_level'];
        // $_SESSION['workshop-level'] = $results[0]['workshop_level'];
        // $_SESSION['archer-level'] = $results[0]['archer_level'];

        // var_dump($_SESSION['user']);

        header('Location: ../frontend/map.php');
        exit();
    } else {
        session_start();
        $_SESSION['flash'] = 'identifiant et/ou mot de passe erroné(s)';
        header('Location: ../index.php');
        exit();
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}






// include_once('infosPlayerRequest.php');

//On compare les mots avec la fonction password_verify


                // include_once('resourcesNeeded.php');

//http_response_code(200);
//} else { // Sinon, on redirige vers index.html pour qu'il retente de se connecter. 
//     http_response_code(401); // Non autorisé
//     header('Location: ../frontend/index.html');
//     exit();
// }

// var_dump($_SESSION['town-food']);



// echo ('connexion');
// echo $_SESSION['town-food'];
// $player = new Player();
// $_SESSION['player'] = $player;
// $player->setPseudo($results[0]['pseudo']);
// $player->setTownFood($results[0]['town_food']);

// header('Location: ../index.php');
// exit();
