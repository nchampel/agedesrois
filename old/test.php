<?php

// include_once('../backend/Models/Player.php');
header('Access-Control-Allow-Origin: *');

if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}

// echo $_SESSION['user']->getPseudo();
header('Location: town.php');
exit();
