<?php

use Models\MySQL;

include_once('Models/MySQL.php');

$rqt = "UPDATE pcclh set pcclh_parties = 5";
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    //On l'execute
    $result = $statement->execute();
    // echo $result;
} catch (\Exception $exception) {
    echo $exception->getMessage();
}
