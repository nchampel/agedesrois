<?php

use Models\MySQL;
use Models\HandleGames;
use Models\HandleResources;
use Models\ManagerGame;

include_once('../backend/Models/MySQL.php');
include_once('../backend/Models/ManagerGame.php');
include_once('../backend/Models/HandleGames.php');
include_once('../backend/Models/HandleResources.php');

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$id = $_SESSION['player']->getId();

$remainingParties = $_SESSION['player']->getPcclh_parties() - 1;
// echo ($remainingParties);
$_SESSION['player']->setPcclh_parties($remainingParties);

ManagerGame::savePartiesPcclh($remainingParties, $id);

if ($remainingParties < 0) {
    $_SESSION['flash'] = 'Plus de parties restantes';
    ManagerGame::createLog($_SESSION['flash'], $id);
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


$_SESSION['flash'] = 'Vous avez choisi ' . $choiceInFrench . "\n";
$_SESSION['flash'] .= 'L\'adversaire a choisi ' . $computerChoiceInFrench . "\n";
$result = HandleGames::pcclh($playerChoice, $computerChoice);
if ($result == 'égalité') {
    $_SESSION['flash'] .= 'Vous avez fait égalité';
    ManagerGame::createLog($_SESSION['flash'], $id);
} else if ($result == 'perdu') {
    $_SESSION['flash'] .=  'Vous avez perdu';
    ManagerGame::createLog($_SESSION['flash'], $id);
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
    $_SESSION['flash'] .= 'Vous avez gagné ! L\'adversaire vous donne ' . number_format($resource, 0, ',', ' ') . ' ' . $typeInFrench;
    ManagerGame::createLog($_SESSION['flash'], $id);
}
header('Location: ../frontend/map.php');
exit();
