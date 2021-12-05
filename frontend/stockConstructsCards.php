<?php
function colorResourceStock($resource, $construct)
{
    $getterStock = 'getStock_' . $resource;
    $getterConstruct = 'get' . ucfirst($resource);
    if ($_SESSION['player']->$getterStock() >= $_SESSION[$construct]->$getterConstruct()) {
        return '#4cff49';
    } else {
        return '#ff2020';
    }
}

$constructsStockType = ['workshop'];

foreach ($constructsStockType as $stockType) {


    $getter = 'getLevel_' . $stockType;
    // $displayLevel = $_SESSION['player']->$getter() + 1;
    echo '<div class="div-constructs">';
    echo '<img class="img-constructs" src="../pictures/workshop-text.jpg" alt="' . ucfirst($_SESSION[$stockType]->getType_item()) . '" />';
    echo '<p>' . ucfirst($_SESSION[$stockType]->getType_item()) . ' niveau <span id="' . $stockType . '-level">'  . $_SESSION['player']->$getter() . '</span> </p>';
    echo '<form id="form-' . $stockType . '-construct" class="tooltip" action="../backend/constructStock.php?type=' . $stockType . '&level=' .
        $_SESSION['player']->$getter() .
        '&foodNeeded=' . $_SESSION[$stockType]->getFood() .
        '&woodNeeded=' .  $_SESSION[$stockType]->getWood() .
        '&metalNeeded=' . $_SESSION[$stockType]->getMetal() .
        '&stoneNeeded=' . $_SESSION[$stockType]->getStone() .
        '&goldNeeded=' . $_SESSION[$stockType]->getGold() . '" method="POST">';
    echo '<div class="tooltiptext">
        <h3>Stock</h3>
        <p id="not-displayed-' . $stockType . '">Augmenter le niveau du château pour pouvoir construire</p>
        <p>Nourriture : <span id="tooltip-food-' . $stockType . '" style="color: ' . colorResourceStock('food', $stockType) . ';">' . number_format((float)$_SESSION[$stockType]->getFood(), 0, ',', ' ') . '</span></p>';
    if ($_SESSION[$stockType]->getWood() > 0) {
        echo '<p>Bois : <span id="tooltip-wood-' . $stockType . '" style="color: ' . colorResourceStock('wood', $stockType) . '";>' . number_format((float)$_SESSION[$stockType]->getWood(), 0, ',', ' ') . '</span></p>';
    }
    if ($_SESSION[$stockType]->getMetal() > 0) {
        echo '<p>Métal : <span id="tooltip-metal-' . $stockType . '" style="color: ' . colorResourceStock('metal', $stockType) . '";>' . number_format((float)$_SESSION[$stockType]->getMetal(), 0, ',', ' ') . '</span></p>';
    }
    if ($_SESSION[$stockType]->getStone() > 0) {
        echo '<p>Pierre : <span id="tooltip-stone-' . $stockType . '" style="color: ' . colorResourceStock('stone', $stockType) . '";>' . number_format((float)$_SESSION[$stockType]->getStone(), 0, ',', ' ') . '</span></p>';
    }
    if ($_SESSION[$stockType]->getGold() > 0) {
        echo '<p>Or : <span id="tooltip-gold-' . $stockType . '" style="color: ' . colorResourceStock('gold', $stockType) . '" ;>' . number_format((float)$_SESSION[$stockType]->getGold(), 0, ',', ' ') . '</span></p>';
    }

    echo '
    </div>';
    echo '<input type="submit" value="Construction" class="button" id="btn-' . $stockType . '"/>';
    /* . $_SESSION[$townType]->getType_item() . ' niveau ' . $displayLevel . '" '*/
    echo '</form>';
    echo '</div>';
}
// echo '<br />';
