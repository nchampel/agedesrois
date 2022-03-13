<?php

use Models\MySQL;

include_once('Models/MySQL.php');


if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}

$pseudo = filter_var($_POST['pseudo'], FILTER_SANITIZE_STRING);
$password1 = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
$password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

// var_dump($email);
// die();

if ($password1 != $password2) {
    $_SESSION['flash'] = "mots de passe différents";
    header('Location: ../inscription.php');
    exit();
}

if (!$email) {
    $_SESSION['flash'] = "mail obligatoire et valide";
    header('Location: ../inscription.php');
    exit();
}

$hashPassword = password_hash($password1, PASSWORD_BCRYPT);
$date = date("Y-m-d H:i:s");

$req = "SELECT pseudo from player";
try {

    $cnx = MySQL::getInstance();

    $statement = $cnx->prepare($req);

    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $result) {
        if (in_array($pseudo, $result)) {
            $_SESSION['flash'] = 'Pseudo déjà utilisé';
            header('Location: ../inscription.php');
            exit();
        }
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$req = "INSERT INTO player (pseudo, player_password, inscription_date, email) VALUES (:pseudo, :passwordPlayer, :inscriptionDate, :email)";
try {

    $cnx = MySQL::getInstance();
    // var_dump($statement);
    $statement = $cnx->prepare($req);

    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':passwordPlayer', $hashPassword);
    $statement->bindParam(':inscriptionDate', $date);
    $statement->bindParam(':email', $email);

    $result = $statement->execute();



    $idPlayer = $cnx->lastInsertId();

    // $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    // if (password_verify($password, $results[0]['password'])) { // si vrai le mot de passe correspond au $hash
    //     // On vient de récupérer l'utilisateur, on créé sa session
    //     session_start();
    //     $user = new Player($results[0]['id'], $results[0]['pseudo']);
    //     $_SESSION['id_user'] = $user->getId();
    //     $_SESSION['pseudo'] = $user->getPseudo(); // les variable de session sont stockées dans le tableau super global $_SESSION

    //     header('Location: ../frontend/map.php');
    //     exit();
    // } else {
    //     $_SESSION['flash'] = 'identifiant et/ou mot de passe erroné(s)';
    //     header('Location: ../index.php');
    //     exit();
    // }
} catch (Exception $exception) {
    echo $exception->getMessage();
}

// var_dump($result);
// die();

$req = "INSERT INTO town (id_player) VALUES (:id)";
try {

    // $cnx = MySQL::getInstance();
    // var_dump($statement);
    $statement = $cnx->prepare($req);

    $statement->bindParam(':id', $idPlayer);

    $statement->execute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$req = "INSERT INTO stock (id_player) VALUES (:id)";
try {

    // $cnx = MySQL::getInstance();
    // var_dump($statement);
    $statement = $cnx->prepare($req);

    $statement->bindParam(':id', $idPlayer);

    $statement->execute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$req = "INSERT INTO level_constructs_town (id_player) VALUES (:id)";
try {

    // $cnx = MySQL::getInstance();
    // var_dump($statement);
    $statement = $cnx->prepare($req);

    $statement->bindParam(':id', $idPlayer);

    $statement->execute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$req = "INSERT INTO level_constructs_stock (id_player) VALUES (:id)";
try {

    // $cnx = MySQL::getInstance();
    // var_dump($statement);
    $statement = $cnx->prepare($req);

    $statement->bindParam(':id', $idPlayer);

    $statement->execute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$req = "INSERT INTO level_army (id_player) VALUES (:id)";
try {

    // $cnx = MySQL::getInstance();
    // var_dump($statement);
    $statement = $cnx->prepare($req);

    $statement->bindParam(':id', $idPlayer);

    $statement->execute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

// $datePcclh = date("Y-m-d H:i:s");

$req = 'INSERT INTO pcclh (id_player, pcclh_date) VALUES (:id, :datePcclh)';
try {

    // $cnx = MySQL::getInstance();
    // var_dump($statement);
    $statement = $cnx->prepare($req);

    $statement->bindParam(':id', $idPlayer);
    $statement->bindParam(':datePcclh', $date);

    $statement->execute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$_SESSION['flash'] = 'Inscription réussie';
header('Location: ../index.php');
exit();
