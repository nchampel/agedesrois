<?php

use Models\MySQL;
use Models\HandleGames;
use Models\HandleResources;

include_once('../backend/Models/MySQL.php');
include_once('../backend/Models/HandleGames.php');
include_once('../backend/Models/HandleResources.php');

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$id = $_SESSION['player']->getId();
// echo $id;

// $rqt = 'SELECT * from player where id = 4';
// try {
//     $statement = MySQL::getInstance()->prepare($rqt);
//     // $statement->bindParam(':id', $id);
//     // $statement->bindParam(':amount', $remainingParties);
//     //On l'execute
//     $statement->execute();
//     $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
// } catch (\Exception $exception) {
//     echo $exception->getMessage();
// }
// print_r($result1);

// die();
$remainingParties = $_SESSION['player']->getPcclh_parties() - 1;
// echo ($remainingParties);
$_SESSION['player']->setPcclh_parties($remainingParties);

$rqt = "UPDATE pcclh set pcclh_parties = :amount where id_player = :id";
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':amount', $remainingParties);
    //On l'execute
    $result = $statement->execute();
    // echo $result;
} catch (\Exception $exception) {
    echo $exception->getMessage();
}

if ($remainingParties < 0) {
    $_SESSION['flash'] = 'Plus de parties restantes';
    header('Location: ../frontend/map.php');
    exit();
}

$playerChoice = filter_var($_GET['choice'], FILTER_SANITIZE_STRING);

switch ($playerChoice) {
    case 'rock':
        $choiceInFrench = 'caillou';
        break;
    case 'paper':
        $choiceInFrench = 'papier';
        break;
    case 'scissors':
        $choiceInFrench = 'ciseaux';
        break;
    case 'lizard':
        $choiceInFrench = 'lézard';
        break;
    case 'man':
        $choiceInFrench = 'homme';
        break;
}
$choices = ['rock', 'paper', 'scissors', 'lizard', 'man'];
$computerChoice = $choices[rand(0, 4)];
switch ($computerChoice) {
    case 'rock':
        $computerChoiceInFrench = 'caillou';
        break;
    case 'paper':
        $computerChoiceInFrench = 'papier';
        break;
    case 'scissors':
        $computerChoiceInFrench = 'ciseaux';
        break;
    case 'lizard':
        $computerChoiceInFrench = 'lézard';
        break;
    case 'man':
        $computerChoiceInFrench = 'homme';
        break;
}


echo 'Vous avez choisi ' . $choiceInFrench . PHP_EOL;
echo 'L\'adversaire a choisi ' . $computerChoiceInFrench . PHP_EOL;
$result = HandleGames::pcclh($playerChoice, $computerChoice);
if ($result == 'égalité') {
    echo 'Vous avez fait égalité';
} else {
    echo 'Vous avez ' . $result . PHP_EOL;
}

if ($result == 'gagné') {
    $types = ['food', 'wood', 'metal', 'stone', 'gold'];
    $type = $types[rand(0, 4)];
    switch ($type) {
        case 'food':
            $typeInFrench = 'nourriture';
            break;
        case 'wood':
            $typeInFrench = 'bois';
            break;
        case 'metal':
            $typeInFrench = 'métal';
            break;
        case 'stone':
            $typeInFrench = 'pierre';
            break;
        case 'gold':
            $typeInFrench = 'or';
            break;
    }
    $amounts = [1000, 2500, 5000, 7500, 10000];
    $resource = $amounts[rand(0, 4)];
    HandleResources::addTownResource($type, $resource, $_SESSION['player']->getId());
    echo 'L\'adversaire vous donne ' . $resource . ' ' . $typeInFrench;
}
