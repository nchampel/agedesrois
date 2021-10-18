<?php

if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}

$trainingBarracks = ['archer'];

$trainingBuildings = [$trainingBarracks];

foreach ($trainingBuildings as $building) {
    foreach ($building as $typeTraining) {
        switch ($typeTraining) {
            case 'archer':
                $levelBuilding = 'barracks-level';
                $levelUnit = 'archer-level';
                break;
        }
        if ((int)$_SESSION[$levelBuilding] <= (int)$_SESSION[$levelUnit]) {
            $_SESSION[$typeTraining]['isOKTraining'] = 'disabled';
        } else {
            $_SESSION[$typeTraining]['isOKTraining'] = 'enabled';
        }
    }
}
