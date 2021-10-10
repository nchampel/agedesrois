<!-- <button id="construct-farm" onclick="construction(<?php //echo ($_SESSION['farm']['food'] . ', ' . $_SESSION['farm']['timeConstruct']); 
                                                        ?>)">Construire ferme</button> -->
<?php
function colorResourceTown($resource, $construct)
{
    switch ($resource) {
        case 'food':
            $resourceColumn = 'town-food';
            break;
        case 'wood':
            $resourceColumn = 'town-wood';
            break;
        case 'metal':
            $resourceColumn = 'town-metal';
            break;
        case 'stone':
            $resourceColumn = 'town-stone';
            break;
        case 'gold':
            $resourceColumn = 'town-gold';
            break;
    }
    // echo $_SESSION[$construct][$resource];
    // echo $_SESSION['farm']['food'];
    if ($_SESSION['town'][$resourceColumn] >= $_SESSION[$construct][$resource]) {
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
        case 'wood':
            $resourceColumn = 'stock-wood';
            break;
        case 'metal':
            $resourceColumn = 'stock-metal';
            break;
        case 'stone':
            $resourceColumn = 'stock-stone';
            break;
        case 'gold':
            $resourceColumn = 'stock-gold';
            break;
    }
    // echo $_SESSION[$construct][$resource];
    // echo $_SESSION['farm']['food'];
    if ($_SESSION['stock'][$resourceColumn] >= $_SESSION[$construct][$resource]) {
        return '#4cff49';
    } else {
        return '#ff2020';
    }
}

$constructsTownType = ['farm', 'sawmill', 'extractor', 'quarry', 'mine', 'barracks'];

foreach ($constructsTownType as $Towntype) {

    switch ($Towntype) {
        case 'farm':
            $level = 'farm-level';
            $construct = 'ferme';
            $displayLevel = (int)$_SESSION[$level] + 1;
            break;
        case 'sawmill':
            $level = 'sawmill-level';
            $construct = 'scierie';
            $displayLevel = (int)$_SESSION[$level] + 1;
            break;
        case 'extractor':
            $level = 'extractor-level';
            $construct = 'extracteur';
            $displayLevel = (int)$_SESSION[$level] + 1;
            break;
        case 'quarry':
            $level = 'quarry-level';
            $construct = 'carrière';
            $displayLevel = (int)$_SESSION[$level] + 1;
            break;
        case 'mine':
            $level = 'mine-level';
            $construct = 'mine';
            $displayLevel = (int)$_SESSION[$level] + 1;
            break;
        case 'barracks':
            $level = 'barracks-level';
            $construct = 'caserne';
            $displayLevel = (int)$_SESSION[$level] + 1;
            break;
    }

    echo '<form id="form-' . $Towntype . '-construct" class="tooltip" action="../backend/constructSubstractResources.php?type=' . $Towntype . '&level=' .
        $_SESSION[$level] .
        '&foodNeeded=' . $_SESSION[$Towntype]['food'] .
        '&woodNeeded=' .  $_SESSION[$Towntype]['wood'] .
        '&metalNeeded=' . $_SESSION[$Towntype]['metal'] .
        '&stoneNeeded=' . $_SESSION[$Towntype]['stone'] .
        '&goldNeeded=' . $_SESSION[$Towntype]['gold'] . '" method="POST">';
    echo '<div class="tooltiptext">
        <h3>Ville</h3>
        <p>Nourriture : <span id="tooltip-food-' . $Towntype . '" style="color: ' . colorResourceTown('food', $Towntype) . ';">' . $_SESSION[$Towntype]['food'] . '</span></p>';
    if ($_SESSION[$Towntype]['wood'] > 0) {
        echo '<p>Bois : <span id="tooltip-wood-' . $Towntype . '" style="color: ' . colorResourceTown('wood', $Towntype) . '";>' . $_SESSION[$Towntype]['wood'] . '</span></p>';
    }
    if ($_SESSION[$Towntype]['metal'] > 0) {
        echo '<p>Métal : <span id="tooltip-metal-' . $Towntype . '" style="color: ' . colorResourceTown('metal', $Towntype) . '";>' . $_SESSION[$Towntype]['metal'] . '</span></p>';
    }
    if ($_SESSION[$Towntype]['stone'] > 0) {
        echo '<p>Pierre : <span id="tooltip-stone-' . $Towntype . '" style="color: ' . colorResourceTown('stone', $Towntype) . '";>' . $_SESSION[$Towntype]['stone'] . '</span></p>';
    }
    if ($_SESSION[$Towntype]['gold'] > 0) {
        echo '<p>Or : <span id="tooltip-gold-' . $Towntype . '" style="color: ' . colorResourceTown('gold', $Towntype) . '" ;>' . $_SESSION[$Towntype]['gold'] . '</span></p>';
    }

    echo '
    </div>';
    echo '<input type="submit" value="Construction ' . $construct . ' niveau ' . $displayLevel . '" class="button" />';
    echo '</form>';
}
echo '<br />';

$constructsStockType = ['workshop'];

foreach ($constructsStockType as $Stocktype) {

    switch ($Stocktype) {
        case 'workshop':
            $level = 'workshop-level';
            $construct = 'atelier';
            $displayLevel = (int)$_SESSION[$level] + 1;
            break;
    }

    echo '<form id="form-' . $Stocktype . '-construct" class="tooltip" action="../backend/constructStockSubstractResources.php?type=' . $Stocktype . '&level=' .
        $_SESSION[$level] .
        '&foodNeeded=' . $_SESSION[$Stocktype]['food'] .
        '&woodNeeded=' .  $_SESSION[$Stocktype]['wood'] .
        '&metalNeeded=' . $_SESSION[$Stocktype]['metal'] .
        '&stoneNeeded=' . $_SESSION[$Stocktype]['stone'] .
        '&goldNeeded=' . $_SESSION[$Stocktype]['gold'] . '" method="POST">';
    echo '<div class="tooltiptext">
        <h3>Stock</h3>
        <p>Nourriture : <span style="color: ' . colorResourceStock('food', $Stocktype) . ';">' . $_SESSION[$Stocktype]['food'] . '</span></p>';
    if ($_SESSION[$Stocktype]['wood'] > 0) {
        echo '<p>Bois : <span style="color: ' . colorResourceStock('wood', $Stocktype) . '";>' . $_SESSION[$Stocktype]['wood'] . '</span></p>';
    }
    if ($_SESSION[$Stocktype]['metal'] > 0) {
        echo '<p>Métal : <span style="color: ' . colorResourceStock('metal', $Stocktype) . '";>' . $_SESSION[$Stocktype]['metal'] . '</span></p>';
    }
    if ($_SESSION[$Stocktype]['stone'] > 0) {
        echo '<p>Pierre : <span style="color: ' . colorResourceStock('stone', $Stocktype) . '";>' . $_SESSION[$Stocktype]['stone'] . '</span></p>';
    }
    if ($_SESSION[$Stocktype]['gold'] > 0) {
        echo '<p>Or : <span style="color: ' . colorResourceStock('gold', $Stocktype) . '" ;>' . $_SESSION[$Stocktype]['gold'] . '</span></p>';
    }

    echo '
    </div>';
    echo '<input type="submit" value="Construction ' . $construct . ' niveau ' . $displayLevel . '" class="button" />';
    echo '</form>';
}

echo '<br />';

?>