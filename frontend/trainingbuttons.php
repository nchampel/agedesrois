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

$trainingsType = ['archer'];

// include_once('../backend/trainingChecking.php');



foreach ($trainingsType as $type) {

    switch ($type) {
        case 'archer':
            // $level = 'archer-level';
            // $displayLevel = (int)$_SESSION[$level] + 1;
            $building = 'de la caserne';
            // $item = 'la';
            break;
    }
    $getter = 'getLevel_' . $type;
    $displayLevel = $_SESSION['player']->$getter() + 1;
    echo '<form id="form-' . $type . '-training" class="tooltip" action="../backend/trainingSubstractResources.php?type=' . $type . '&level=' .
        $_SESSION['player']->$getter() .
        '&foodNeeded=' . $_SESSION[$type]->getFood() .
        '&bowNeeded=' . $_SESSION[$type]->getBow() .
        '&goldNeeded=' . $_SESSION[$type]->getGold() . '" method="POST">';
    echo '<div class="tooltiptext">
        <h3>' . ucfirst($building) . '</h3>';
    //if ($_SESSION[$type]['isOKTraining'] == 'disabled') {
    echo '<p id="not-displayed-' . $type . '">Augmenter le niveau ' . $building . ' pour entraîner</p>';
    //echo 'Augmenter le niveau de ' . $item . ' ' . $building . ' pour entraîner';
    //}
    echo '<p>Nourriture : <span style="color: ' . colorResourceTrainingTown('food', $type) . ';">' . $_SESSION[$type]->getFood() . '</span></p>';
    if ($_SESSION[$type]->getBow() > 0) {
        echo '<p>Arcs : <span style="color: ' . colorResourceTrainingTown('bow', $type) . '";>' . $_SESSION[$type]->getBow() . '</span></p>';
    }
    if ($_SESSION[$type]->getGold() > 0) {
        echo '<p>Or : <span style="color: ' . colorResourceTrainingTown('gold', $type) . '";>' . $_SESSION[$type]->getGold() . '</span></p>';
    }

    echo '</div>';
    echo '<input type="submit" value="Entraînement ' . $type . ' niveau ' . $displayLevel . '" class="button" id="btn-' . $type . '" ' ./* $_SESSION[$type]['isOKTraining'] .*/ '/>';
    echo '</form>';
}


?>