<!-- <button id="construct-farm" onclick="construction(<?php //echo ($_SESSION['farm']['food'] . ', ' . $_SESSION['farm']['timeConstruct']); 
                                                        ?>)">Construire ferme</button> -->
<?php
function colorResourceTown($resource, $construct)
{
    switch ($resource) {
        case 'food':
            $resourceColumn = 'town-food';
            break;
    }
    $getterTown = 'getTown_' . $resource;
    $getterConstruct = 'get' . ucfirst($resource);
    // echo $_SESSION[$construct][$resource];
    // echo $_SESSION['farm']['food'];
    if ($_SESSION['player']->$getterTown() >= $_SESSION[$construct]->$getterConstruct()) {
        // if ($_SESSION['town'][$resourceColumn] >= $_SESSION[$construct][$resource]) {
        return '#4cff49';
    } else {
        return '#ff2020';
    }
}
function colorResourceStock($resource, $construct)
{
    switch ($resource) {
        case 'food':
            $resourceColumn = 'stock-food';
            break;
    }
    $getterStock = 'getStock_' . $resource;
    $getterConstruct = 'get' . ucfirst($resource);
    // echo $_SESSION[$construct][$resource];
    // echo $_SESSION['farm']['food'];
    if ($_SESSION['player']->$getterStock() >= $_SESSION[$construct]->$getterConstruct()) {
        // if ($_SESSION['town'][$resourceColumn] >= $_SESSION[$construct][$resource]) {
        return '#4cff49';
    } else {
        return '#ff2020';
    }
    // if ($_SESSION['stock'][$resourceColumn] >= $_SESSION[$construct][$resource]) {
    //     return '#4cff49';
    // } else {
    //     return '#ff2020';
    // }
}

$constructsTownType = ['castle', 'farm', 'sawmill', 'extractor', 'quarry', 'mine', 'barracks'];

foreach ($constructsTownType as $townType) {

    switch ($townType) {
            // case 'castle':
            //     $level = 'castle-level';
            //     $construct = 'château';
            //     $displayLevel = (int)$_SESSION[$level] + 1;
            //     break;
            // case 'farm':
            //     $level = 'farm-level';
            //     $construct = 'ferme';
            //     $displayLevel = (int)$_SESSION[$level] + 1;
            //     break;
            // case 'sawmill':
            //     $level = 'sawmill-level';
            //     $construct = 'scierie';
            //     $displayLevel = (int)$_SESSION[$level] + 1;
            //     break;
            // case 'extractor':
            //     $level = 'extractor-level';
            //     $construct = 'extracteur';
            //     $displayLevel = (int)$_SESSION[$level] + 1;
            //     break;
            // case 'quarry':
            //     $level = 'quarry-level';
            //     $construct = 'carrière';
            //     $displayLevel = (int)$_SESSION[$level] + 1;
            //     break;
            // case 'mine':
            //     $level = 'mine-level';
            //     $construct = 'mine';
            //     $displayLevel = (int)$_SESSION[$level] + 1;
            //     break;
            // case 'barracks':
            //     $level = 'barracks-level';
            //     $construct = 'caserne';
            //     $displayLevel = (int)$_SESSION[$level] + 1;
            //     break;
    }
    $getter = 'getLevel_' . $townType;
    $displayLevel = $_SESSION['player']->$getter() + 1;
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
        <p>Nourriture : <span id="tooltip-food-' . $townType . '" style="color: ' . colorResourceTown('food', $townType) . ';">' . $_SESSION[$townType]->getFood() . '</span></p>';
    if ($_SESSION[$townType]->getWood() > 0) {
        echo '<p>Bois : <span id="tooltip-wood-' . $townType . '" style="color: ' . colorResourceTown('wood', $townType) . '";>' . $_SESSION[$townType]->getWood() . '</span></p>';
    }
    if ($_SESSION[$townType]->getMetal() > 0) {
        echo '<p>Métal : <span id="tooltip-metal-' . $townType . '" style="color: ' . colorResourceTown('metal', $townType) . '";>' . $_SESSION[$townType]->getMetal() . '</span></p>';
    }
    if ($_SESSION[$townType]->getStone() > 0) {
        echo '<p>Pierre : <span id="tooltip-stone-' . $townType . '" style="color: ' . colorResourceTown('stone', $townType) . '";>' . $_SESSION[$townType]->getStone() . '</span></p>';
    }
    if ($_SESSION[$townType]->getGold() > 0) {
        echo '<p>Or : <span id="tooltip-gold-' . $townType . '" style="color: ' . colorResourceTown('gold', $townType) . '" ;>' . $_SESSION[$townType]->getGold() . '</span></p>';
    }

    echo '
    </div>';
    echo '<input type="submit" value="Construction ' . $_SESSION[$townType]->getType_item() . ' niveau ' . $displayLevel . '" class="button" id="btn-' . $townType . '" />';
    echo '</form>';
}
echo '<br />';

$constructsStockType = ['workshop'];

foreach ($constructsStockType as $stockType) {

    // switch ($stockType) {
    //     case 'workshop':
    //         $level = 'workshop-level';
    //         $construct = 'atelier';
    //         $displayLevel = (int)$_SESSION[$level] + 1;
    //         break;
    // }

    $getter = 'getLevel_' . $stockType;
    $displayLevel = $_SESSION['player']->$getter() + 1;
    // constructStockSubstractResources.php
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
        <p>Nourriture : <span style="color: ' . colorResourceStock('food', $stockType) . ';">' . $_SESSION[$stockType]->getFood() . '</span></p>';
    if ($_SESSION[$stockType]->getWood() > 0) {
        echo '<p>Bois : <span style="color: ' . colorResourceStock('wood', $stockType) . '";>' . $_SESSION[$stockType]->getWood() . '</span></p>';
    }
    if ($_SESSION[$stockType]->getMetal() > 0) {
        echo '<p>Métal : <span style="color: ' . colorResourceStock('metal', $stockType) . '";>' . $_SESSION[$stockType]->getMetal() . '</span></p>';
    }
    if ($_SESSION[$stockType]->getStone() > 0) {
        echo '<p>Pierre : <span style="color: ' . colorResourceStock('stone', $stockType) . '";>' . $_SESSION[$stockType]->getStone() . '</span></p>';
    }
    if ($_SESSION[$stockType]->getGold() > 0) {
        echo '<p>Or : <span style="color: ' . colorResourceStock('gold', $stockType) . '" ;>' . $_SESSION[$stockType]->getGold() . '</span></p>';
    }

    echo '
    </div>';
    echo '<input type="submit" value="Construction ' . $_SESSION[$stockType]->getType_item() . ' niveau ' . $displayLevel . '" class="button" id="btn-' . $stockType . '" />';
    echo '</form>';
}

echo '<br />';

?>