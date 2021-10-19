<?php

use Models\MySQL;
use Models\HandleGames;
use Models\HandleResources;

header('Access-Control-Allow-Origin: *');

include_once('../backend/Models/Player.php');
include_once('../backend/Models/MySQL.php');
include_once('../backend/Models/HandleResources.php');
include_once('../backend/Models/HandleGames.php');
include_once('../backend/Models/Constructs/Farm.php');
include_once('../backend/Models/Constructs/Castle.php');
include_once('../backend/Models/Constructs/Extractor.php');
include_once('../backend/Models/Constructs/Mine.php');
include_once('../backend/Models/Constructs/Quarry.php');
include_once('../backend/Models/Constructs/Sawmill.php');
include_once('../backend/Models/Constructs/Workshop.php');
include_once('../backend/Models/Constructs/Barracks.php');
include_once('../backend/Models/Army/Archer.php');

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
// echo ('test');
if (empty($_SESSION['player'])) {
    // echo ('test');
    header('Location: ../index.php');
    exit();
}


if (isset($_SESSION['player'])) {
    $id = $_SESSION['player']->getId();
    HandleResources::townResourcesRecovering($id, $_SESSION['player']);
    HandleGames::numberPartiesRecovering($id, $_SESSION['player']);
    HandleResources::resourcesNeeded();
}

// vérifier si il y a eu un jour passé pour savoir si on rajoute 5 parties
// SELECT DATE_FORMAT("2018-09-24 22:21:20", "%Y-%m-%d");
$rqt = 'SELECT DATE_FORMAT(pcclh_date, "%Y-%m-%d") AS `date_pcclh` from pcclh where id_player = :id';
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    // $statement->bindParam(':amount', $remainingParties);
    //On l'execute
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (\Exception $exception) {
    echo $exception->getMessage();
}
print_r($result);
$datesql = $result[0]['date_pcclh'];
$date = date("Y-m-d H:i:s");
$date2 = new DateTime($date);
$date1 = new DateTime($datesql);
$date2->format('Y-m-d');
echo $date1->diff($date2)->format("%d");
// die();
if ($date1->diff($date2)->format("%d") > 0) {
    $remainingParties = 5;
    $_SESSION['player']->setPcclh_parties($remainingParties);
    $rqt = "UPDATE pcclh set pcclh_date = :actualDate where id_player = :id";
    try {
        $statement = MySQL::getInstance()->prepare($rqt);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':actualDate', $date);
        //On l'execute
        $result = $statement->execute();
        // echo $result;
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
    } catch (\Exception $exception) {
        echo $exception->getMessage();
    }
    echo 'ajout';
}


// if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
//     header('Location: ../index.php');
//     exit();
// }
// include_once('../backend/resourcesRecoveringMap.php');
echo ('<pre>');
print_r($_SESSION);
// echo 'true';
// echo true;
// echo 'false';
// echo false;
echo ('</pre>');
//$player = $_SESSION['player'];
// echo ($_SESSION['farm']['food'] . ',' . $_SESSION['farm']['timeConstruct']);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>L'âge des Rois</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <!-- <progress id="progress-bar" value="60" max="100"></progress> -->
    <div id="div-progress-bar">
        <div id="progress-bar"></div>
    </div>
    <p id="flash-message">
        <?php
        if (isset($_SESSION['flash'])) {
            if (!empty($_SESSION['flash'])) {
                echo $_SESSION['flash'];
                $_SESSION['flash'] = '';
            }
        }
        // echo $_SESSION['user']->getPseudo;
        ?>
    </p>




    <!-- <p id="waiting-message"></p> -->

    <!-- <h1>Salut <?php //echo $_SESSION['player']; 
                    ?> !</h1>
    <p>Nourriture dans la ville : <?php //echo $player['player']; 
                                    ?> </p> -->
    <h1 id="test">Salut <span id="pseudo"><?php echo $_SESSION['player']->getPseudo(); ?></span> !</h1>

    <form action="../backend/pcclh.php?choice=paper" method="POST">
        <input type="submit" value="Papier" class="button" />
    </form>
    <form action="../backend/pcclh.php?choice=scissors" method="POST">
        <input type="submit" value="Ciseaux" class="button" />
    </form>
    <form action="../backend/pcclh.php?choice=rock" method="POST">
        <input type="submit" value="Caillou" class="button" />
    </form>
    <form action="../backend/pcclh.php?choice=lizard" method="POST">
        <input type="submit" value="Lézard" class="button" />
    </form>
    <form action="../backend/pcclh.php?choice=man" method="POST">
        <input type="submit" value="Homme" class="button" />
    </form>

    <?php include('townresources.php'); ?>

    <br>

    <?php include('stockresources.php'); ?>

    <?php include('informations.php'); ?>

    <?php include('constructionlevels.php'); ?>

    <?php include('constructionbuttons.php');
    ?>

    <?php // include('../backend/trainingChecking.php'); 
    ?>

    <?php include('trainingbuttons.php');
    ?>

    <!-- ajout -->

    <?php
    // function colorResourceTown($resource, $construct)
    // {
    //     switch ($resource) {
    //         case 'food':
    //             $resourceColumn = 'town-food';
    //             break;
    //     }
    //     $getterTown = 'getTown_' . $resource;
    //     $getterConstruct = 'get' . ucfirst($resource);
    //     // echo $_SESSION[$construct][$resource];
    //     // echo $_SESSION['farm']['food'];
    //     if ($_SESSION['player']->$getterTown() >= $_SESSION[$construct]->$getterConstruct()) {
    //         // if ($_SESSION['town'][$resourceColumn] >= $_SESSION[$construct][$resource]) {
    //         return '#4cff49';
    //     } else {
    //         return '#ff2020';
    //     }
    // }

    // echo colorResourceTown('food', 'castle');

    ?>
    <!-- fin ajout -->



    <!-- <form action="../backend/connexion.php" method="POST" id="form-save-resources">
        <input type="submit" value="Sauvegarde ressources" class="button" />
    </form> -->

    <p>Ressources à transférer dans la réserve</p>
    <form id="form-stock" action="../backend/stock.php" method="POST">
        <label for="transfer-food">Nourriture</label>
        <input type="text" name="transfer-food" id="transfer-food" value="0">
        <label for="transfer-wood">Bois</label>
        <input type="text" name="transfer-wood" id="transfer-wood" value="0">
        <label for="transfer-metal">Métal</label>
        <input type="text" name="transfer-metal" id="transfer-metal" value="0">
        <label for="transfer-stone">Pierre</label>
        <input type="text" name="transfer-stone" id="transfer-stone" value="0">
        <label for="transfer-gold">Or</label>
        <input type="text" name="transfer-gold" id="transfer-gold" value="0">
        <input type="submit" value="Mettre en stock" class="button" id="btn-stock" />
    </form>

    <?php include('world.php'); ?>

    <?php
    // $constructsFromTownResources = ['farm', 'sawmill', 'extractor', 'quarry', 'mine'];
    // $constructsFromStockResources = ['workshop'];

    // foreach ($constructsFromTownResources as $construct) {
    //     switch ($construct) {
    //         case 'farm':
    //             $constructIsOK = 'farm-construct-isOK';
    //             break;
    //         case 'sawmill':
    //             $constructIsOK = 'sawmill-construct-isOK';
    //             break;
    //         case 'extractor':
    //             $constructIsOK = 'extractor-construct-isOK';
    //             break;
    //         case 'quarry':
    //             $constructIsOK = 'quarry-construct-isOK';
    //             break;
    //         case 'mine':
    //             $constructIsOK = 'mine-construct-isOK';
    //             break;
    //     }
    //     if (
    //         $_SESSION['user']->getTown_food() >= $_SESSION[$construct]['food'] &&
    //         $_SESSION['user']->getTown_wood() >= $_SESSION[$construct]['wood'] &&
    //         $_SESSION['user']->getTown_metal() >= $_SESSION[$construct]['metal'] &&
    //         $_SESSION['user']->getTown_stone() >= $_SESSION[$construct]['stone'] &&
    //         $_SESSION['user']->getTown_gold() >= $_SESSION[$construct]['gold']
    //     ) {
    //         $_SESSION[$constructIsOK] = 'true';
    //     } else {
    //         $_SESSION[$constructIsOK] = 'false';
    //     }
    // }

    // foreach ($constructsFromStockResources as $construct) {
    //     switch ($construct) {
    //         case 'workshop':
    //             $constructIsOK = 'workshop-construct-isOK';
    //             break;
    //     }
    //     if (
    //         $_SESSION['stock']['stock-food'] >= $_SESSION[$construct]['food'] &&
    //         $_SESSION['stock']['stock-wood'] >= $_SESSION[$construct]['wood'] &&
    //         $_SESSION['stock']['stock-metal'] >= $_SESSION[$construct]['metal'] &&
    //         $_SESSION['stock']['stock-stone'] >= $_SESSION[$construct]['stone'] &&
    //         $_SESSION['stock']['stock-gold'] >= $_SESSION[$construct]['gold']
    //     ) {
    //         $_SESSION[$constructIsOK] = 'true';
    //     } else {
    //         $_SESSION[$constructIsOK] = 'false';
    //     }
    // }

    // if (
    //     $_SESSION['stock']['stock-food'] >= $_SESSION[$construct]['food'] &&
    //     $_SESSION['stock']['stock-wood'] >= $_SESSION[$construct]['wood'] &&
    //     $_SESSION['stock']['stock-metal'] >= $_SESSION[$construct]['metal'] &&
    //     $_SESSION['stock']['stock-stone'] >= $_SESSION[$construct]['stone'] &&
    //     $_SESSION['stock']['stock-gold'] >= $_SESSION[$construct]['gold']
    // ) {
    //     $_SESSION[$constructIsOK] = 'true';
    // } else {
    //     $_SESSION[$constructIsOK] = 'false';
    // }

    // if (isset($_POST['stock-food'])) {
    //     echo filter_var($_POST['stock-food'], FILTER_SANITIZE_STRING);
    // }

    echo ('<pre>');
    // var_dump($_SESSION);

    echo ('</pre>');
    $constructs = ['castle', 'farm', 'sawmill', 'extractor', 'quarry', 'mine', 'barracks', 'workshop'];
    $trainings = ['archer'];
    ?>

    <script>
        let idPlayer = <?php echo $_SESSION['player']->getId(); ?>;

        let foodTown = <?php echo $_SESSION['player']->getTown_food(); ?>;
        let woodTown = <?php echo $_SESSION['player']->getTown_wood(); ?>;
        let metalTown = <?php echo $_SESSION['player']->getTown_metal(); ?>;
        let stoneTown = <?php echo $_SESSION['player']->getTown_stone(); ?>;
        let goldTown = <?php echo $_SESSION['player']->getTown_gold(); ?>;

        <?php

        foreach ($constructs as $construct) {
            $getterLevel = 'getLevel_' . $construct;
            echo 'let ' . $construct . 'Food = ' . $_SESSION[$construct]->getFood() . ';' . PHP_EOL;
            echo 'let ' . $construct . 'Wood = ' . $_SESSION[$construct]->getWood() . ';' . PHP_EOL;
            echo 'let ' . $construct . 'Metal = ' . $_SESSION[$construct]->getMetal() . ';' . PHP_EOL;
            echo 'let ' . $construct . 'Stone = ' . $_SESSION[$construct]->getStone() . ';' . PHP_EOL;
            echo 'let ' . $construct . 'Gold = ' . $_SESSION[$construct]->getGold() . ';' . PHP_EOL;
            echo 'let timeConstruct' . ucfirst($construct) . ' = ' . $_SESSION[$construct]->getTime_construct() . ';' . PHP_EOL;
            echo 'let level' . ucfirst($construct) . ' = ' . $_SESSION['player']->$getterLevel() . ';' . PHP_EOL;
        }
        foreach ($trainings as $training) {
            $getterLevel = 'getLevel_' . $training;
            echo 'let ' . $training . 'Food = ' . $_SESSION[$training]->getFood() . ';' . PHP_EOL;
            echo 'let ' . $training . 'Gold = ' . $_SESSION[$training]->getGold() . ';' . PHP_EOL;
            echo 'let ' . $training . 'Bow = ' . $_SESSION[$training]->getBow() . ';' . PHP_EOL;
            echo 'let timeTraining' . ucfirst($training) . ' = ' . $_SESSION[$training]->getTime_training() . ';' . PHP_EOL;
            echo 'let level' . ucfirst($training) . ' = ' . $_SESSION['player']->$getterLevel() . ';' . PHP_EOL;
        }



        ?>



        // let levelCastle = <?php echo $_SESSION['player']->getLevel_castle(); ?>;
        // let levelFarm = <?php echo $_SESSION['player']->getLevel_farm(); ?>;
        // let levelSawmill = <?php echo $_SESSION['player']->getLevel_sawmill(); ?>;
        // let levelExtractor = <?php echo $_SESSION['player']->getLevel_extractor(); ?>;
        // let levelQuarry = <?php echo $_SESSION['player']->getLevel_quarry(); ?>;
        // let levelMine = <?php echo $_SESSION['player']->getLevel_mine(); ?>;
        // let levelBarracks = <?php echo $_SESSION['player']->getLevel_barracks(); ?>;

        // let levelWorkshop = <?php echo $_SESSION['player']->getLevel_workshop(); ?>;

        // let levelArcher = <?php echo $_SESSION['player']->getLevel_archer(); ?>;

        // let isConstructOKFarm = JSON.parse(<?php //echo $_SESSION['farm-construct-isOK']; 
                                                ?>);
        // let isConstructOKSawmill = JSON.parse(<?php //echo $_SESSION['sawmill-construct-isOK']; 
                                                    ?>);
        // let isConstructOKExtractor = JSON.parse(<?php //echo $_SESSION['extractor-construct-isOK']; 
                                                    ?>);
        // let isConstructOKQuarry = JSON.parse(<?php //echo $_SESSION['quarry-construct-isOK']; 
                                                ?>);
        // let isConstructOKMine = JSON.parse(<?php //echo $_SESSION['mine-construct-isOK']; 
                                                ?>);

        // let isConstructOKWorkshop = JSON.parse(<?php //echo $_SESSION['workshop-construct-isOK']; 
                                                    ?>);

        //let isTrainingOKArcher = JSON.parse(<?php //echo $_SESSION['archer-training-isOK'];
                                                ?>);
        // let isTrainingOKArcher = true;
        // let isStockResourcesOK = true;
    </script>

    <script src="../js/design.js"></script>
    <script src="../js/time.js"></script>
    <script src="../js/construct.js"></script>

</body>

</html>