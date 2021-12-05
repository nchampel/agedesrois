<?php
function colorResourceTown($resource, $construct)
{
    $getterTown = 'getTown_' . $resource;
    $getterConstruct = 'get' . ucfirst($resource);
    if ($_SESSION['player']->$getterTown() >= $_SESSION[$construct]->$getterConstruct()) {
        return '#4cff49';
    } else {
        return '#ff2020';
    }
}

$constructsTownType = ['castle', 'farm', 'sawmill', 'extractor', 'quarry', 'mine', 'barracks'];

foreach ($constructsTownType as $townType) {


    $getter = 'getLevel_' . $townType;
    // $displayLevel = $_SESSION['player']->$getter() + 1;
    echo '<div class="div-constructs">';
    echo '<img class="img-constructs" src="../pictures/' . $townType . '-text.jpg" alt="' . ucfirst($_SESSION[$townType]->getType_item()) . '" />';
    echo '<p>' . ucfirst($_SESSION[$townType]->getType_item()) . ' niveau <span id="' . $townType . '-level">'  . $_SESSION['player']->$getter() . '</span> </p>';
    echo '<form id="form-' . $townType . '-construct" class="tooltip" action="../backend/constructTown.php?type=' . $townType . '&level=' .
        $_SESSION['player']->$getter() .
        '&foodNeeded=' . $_SESSION[$townType]->getFood() .
        '&woodNeeded=' .  $_SESSION[$townType]->getWood() .
        '&metalNeeded=' . $_SESSION[$townType]->getMetal() .
        '&stoneNeeded=' . $_SESSION[$townType]->getStone() .
        '&goldNeeded=' . $_SESSION[$townType]->getGold() . '" method="POST">';
    echo '<div class="tooltiptext">
        <h3>Ville</h3>
        <p id="not-displayed-' . $townType . '">Augmenter le niveau du château pour pouvoir construire</p>
        <p>Nourriture : <span id="tooltip-food-' . $townType . '" style="color: ' . colorResourceTown('food', $townType) . ';">' . number_format((float)$_SESSION[$townType]->getFood(), 0, ',', ' ') . '</span></p>';
    if ($_SESSION[$townType]->getWood() > 0) {
        echo '<p>Bois : <span id="tooltip-wood-' . $townType . '" style="color: ' . colorResourceTown('wood', $townType) . '";>' . number_format((float)$_SESSION[$townType]->getWood(), 0, ',', ' ') . '</span></p>';
    }
    if ($_SESSION[$townType]->getMetal() > 0) {
        echo '<p>Métal : <span id="tooltip-metal-' . $townType . '" style="color: ' . colorResourceTown('metal', $townType) . '";>' . number_format((float)$_SESSION[$townType]->getMetal(), 0, ',', ' ') . '</span></p>';
    }
    if ($_SESSION[$townType]->getStone() > 0) {
        echo '<p>Pierre : <span id="tooltip-stone-' . $townType . '" style="color: ' . colorResourceTown('stone', $townType) . '";>' . number_format((float)$_SESSION[$townType]->getStone(), 0, ',', ' ') . '</span></p>';
    }
    if ($_SESSION[$townType]->getGold() > 0) {
        echo '<p>Or : <span id="tooltip-gold-' . $townType . '" style="color: ' . colorResourceTown('gold', $townType) . '" ;>' . number_format((float)$_SESSION[$townType]->getGold(), 0, ',', ' ') . '</span></p>';
    }

    echo '
    </div>';
    echo '<input type="submit" value="Construction" class="button" id="btn-' . $townType . '"/>';
    /* . $_SESSION[$townType]->getType_item() . ' niveau ' . $displayLevel . '" '*/
    echo '</form>';
    echo '</div>';
}
// echo '<br />';
