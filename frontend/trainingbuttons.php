<!-- <button id="construct-farm" onclick="construction(<?php //echo ($_SESSION['farm']['food'] . ', ' . $_SESSION['farm']['timeConstruct']); 
                                                        ?>)">Construire ferme</button> -->
<?php
function colorResourceTrainingTown($resource, $training)
{
    switch ($resource) {
        case 'food':
            $resourceColumn = 'town-food';
            break;
        case 'gold':
            $resourceColumn = 'town-gold';
            break;
        case 'bow':
            $resourceColumn = 'town-bow';
            break;
    }
    // echo $_SESSION[$training][$resource];
    // echo $_SESSION['farm']['food'];
    if ($_SESSION['town'][$resourceColumn] >= $_SESSION[$training][$resource]) {
        return '#4cff49';
    } else {
        return '#ff2020';
    }
}

$trainingsType = ['archer'];

include_once('../backend/trainingChecking.php');



foreach ($trainingsType as $type) {

    switch ($type) {
        case 'archer':
            $level = 'archer-level';
            $displayLevel = (int)$_SESSION[$level] + 1;
            $building = 'caserne';
            $item = 'la';
            break;
    }

    echo '<form id="form-' . $type . '-training" class="tooltip" action="../backend/trainingSubstractResources.php?type=' . $type . '&level=' .
        $_SESSION[$level] .
        '&foodNeeded=' . $_SESSION[$type]['food'] .
        '&bowNeeded=' . $_SESSION[$type]['bow'] .
        '&goldNeeded=' . $_SESSION[$type]['gold'] . '" method="POST">';
    echo '<div class="tooltiptext">
        <h3>' . ucfirst($building) . '</h3>';
    if ($_SESSION[$type]['isOKTraining'] == 'disabled') {
        echo 'Augmenter le niveau de ' . $item . ' ' . $building . ' pour entraîner';
    }
    echo '<p>Nourriture : <span style="color: ' . colorResourceTrainingTown('food', $type) . ';">' . $_SESSION[$type]['food'] . '</span></p>';
    if ($_SESSION[$type]['bow'] > 0) {
        echo '<p>Arcs : <span style="color: ' . colorResourceTrainingTown('bow', $type) . '";>' . $_SESSION[$type]['bow'] . '</span></p>';
    }
    if ($_SESSION[$type]['gold'] > 0) {
        echo '<p>Or : <span style="color: ' . colorResourceTrainingTown('gold', $type) . '";>' . $_SESSION[$type]['gold'] . '</span></p>';
    }

    echo '</div>';
    echo '<input type="submit" value="Entraînement ' . $type . ' niveau ' . $displayLevel . '" class="button" ' . $_SESSION[$type]['isOKTraining'] . '/>';
    echo '</form>';
}


?>