<?php
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




include_once('resourcesNeeded.php');
