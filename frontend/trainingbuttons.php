<!-- <button id="construct-farm" onclick="construction(<?php //echo ($_SESSION['farm']['food'] . ', ' . $_SESSION['farm']['timeConstruct']); 
                                                        ?>)">Construire ferme</button> -->
<?php
function colorResourceTrainingTown($resource, $training)
{
    // switch ($resource) {
    //     case 'food':
    //         $resourceColumn = 'town-food';
    //         break;
    //     case 'gold':
    //         $resourceColumn = 'town-gold';
    //         break;
    //     case 'bow':
    //         $resourceColumn = 'town-bow';
    //         break;
    // }
    $getterTown = 'getTown_' . $resource;
    $getterTraining = 'get' . ucfirst($resource);
    // echo $_SESSION[$construct][$resource];
    // echo $_SESSION['farm']['food'];
    if ($_SESSION['player']->$getterTown() >= $_SESSION[$training]->$getterTraining()) {
        // if ($_SESSION['town'][$resourceColumn] >= $_SESSION[$construct][$resource]) {
        return '#4cff49';
    } else {
        return '#ff2020';
    }
    // echo $_SESSION[$training][$resource];
    // echo $_SESSION['farm']['food'];
    // if ($_SESSION['town'][$resourceColumn] >= $_SESSION[$training][$resource]) {
    //     return '#4cff49';
    // } else {
    //     return '#ff2020';
    // }
}

$trainingsType = ['archer'/*, 'crossbowman'*/];

// include_once('../backend/trainingChecking.php');



foreach ($trainingsType as $type) {

    switch ($type) {
        case 'archer':
        case 'crossbowman':
            // $level = 'archer-level';
            // $displayLevel = (int)$_SESSION[$level] + 1;
            $buildingAnswer = 'de la caserne';
            $building = 'caserne';
            $buildingEnglish = 'barracks';
            // $item = 'la';
            break;
    }
    $getter = 'getLevel_' . $type;
    $displayLevel = $_SESSION['player']->$getter() + 1;
    // action = "../backend/trainingSubstractResources.php
    echo '<form id="form-' . $type . '-training" class="tooltip" action="../backend/training.php?type=' . $type .
        '&level=' . $_SESSION['player']->$getter() . '&typeBuilding=' . $buildingEnglish .
        '&foodNeeded=' . $_SESSION[$type]->getFood() .
        '&bowNeeded=' . $_SESSION[$type]->getBow() .
        '&goldNeeded=' . $_SESSION[$type]->getGold() . '" method="POST">';
    echo '<div class="tooltiptext">
        <h3>' . ucfirst($building) . '</h3>';
    //if ($_SESSION[$type]['isOKTraining'] == 'disabled') {
    echo '<p id="not-displayed-' . $type . '">Augmenter le niveau ' . $buildingAnswer . ' pour pouvoir entraîner</p>';
    //echo 'Augmenter le niveau de ' . $item . ' ' . $building . ' pour entraîner';
    //}
    echo '<p>Nourriture : <span id="tooltip-food-' . $type . '" style="color: ' . colorResourceTrainingTown('food', $type) . ';">' . $_SESSION[$type]->getFood() . '</span></p>';
    if ($_SESSION[$type]->getBow() > 0) {
        echo '<p>Arcs : <span id="tooltip-bow-' . $type . '" style="color: ' . colorResourceTrainingTown('bow', $type) . '";>' . $_SESSION[$type]->getBow() . '</span></p>';
    }
    if ($_SESSION[$type]->getGold() > 0) {
        echo '<p>Or : <span id="tooltip-gold-' . $type . '" style="color: ' . colorResourceTrainingTown('gold', $type) . '";>' . $_SESSION[$type]->getGold() . '</span></p>';
    }

    echo '</div>';
    echo '<input type="submit" value="Entraînement ' . $_SESSION[$type]->getType_army() . ' niveau ' . $displayLevel . '" class="button" id="btn-' . $type . '" ' ./* $_SESSION[$type]['isOKTraining'] .*/ '/>';
    echo '</form>';
}


?>