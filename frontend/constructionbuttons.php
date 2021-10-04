<!-- <button id="construct-farm" onclick="construction(<?php //echo ($_SESSION['farm']['food'] . ', ' . $_SESSION['farm']['timeConstruct']); 
                                                        ?>)">Construire ferme</button> -->

<form id="form-farm-construct" class="tooltip" action="../backend/constructSubstractResources.php?type=farm&level=
    <?php echo $_SESSION['farm-level']; ?>
    &foodNeeded=<?php echo $_SESSION['farm']['food']; ?>
    &woodNeeded=<?php echo $_SESSION['farm']['wood']; ?>
    &metalNeeded=<?php echo $_SESSION['farm']['metal']; ?>
    &stoneNeeded=<?php echo $_SESSION['farm']['stone']; ?>
    &goldNeeded=<?php echo $_SESSION['farm']['gold']; ?>" method="POST">
    <div class="tooltiptext">
        <h3>Ville</h3>
        <p>Nourriture : <?php echo $_SESSION['farm']['food']; ?></p>
        <?php if ($_SESSION['farm']['wood'] > 0) {
            echo '<p>Bois : ' . $_SESSION['farm']['wood'] . '</p>';
        }
        if ($_SESSION['farm']['metal'] > 0) {
            echo '<p>Métal : ' . $_SESSION['farm']['metal'] . '</p>';
        }
        if ($_SESSION['farm']['stone'] > 0) {
            echo '<p>Pierre : ' . $_SESSION['farm']['stone'] . '</p>';
        }
        if ($_SESSION['farm']['gold'] > 0) {
            echo '<p>Or : ' . $_SESSION['farm']['gold'] . '</p>';
        }
        ?>
    </div>
    <input type="submit" value="Construction ferme niveau <?php echo $_SESSION['farm-level'] + 1; ?>" class="button" />
</form>
<form id="form-sawmill-construct" class="tooltip" action="../backend/constructSubstractResources.php?type=sawmill&level=
    <?php echo $_SESSION['sawmill-level']; ?>
    &foodNeeded=<?php echo $_SESSION['sawmill']['food']; ?>
    &woodNeeded=<?php echo $_SESSION['sawmill']['wood']; ?>
    &metalNeeded=<?php echo $_SESSION['sawmill']['metal']; ?>
    &stoneNeeded=<?php echo $_SESSION['sawmill']['stone']; ?>
    &goldNeeded=<?php echo $_SESSION['sawmill']['gold']; ?>" method="POST">
    <div class="tooltiptext">
        <h3>Ville</h3>
        <p>Nourriture : <?php echo $_SESSION['sawmill']['food']; ?></p>
        <?php if ($_SESSION['sawmill']['wood'] > 0) {
            echo '<p>Bois : ' . $_SESSION['sawmill']['wood'] . '</p>';
        }
        if ($_SESSION['sawmill']['metal'] > 0) {
            echo '<p>Métal : ' . $_SESSION['sawmill']['metal'] . '</p>';
        }
        if ($_SESSION['sawmill']['stone'] > 0) {
            echo '<p>Pierre : ' . $_SESSION['sawmill']['stone'] . '</p>';
        }
        if ($_SESSION['sawmill']['gold'] > 0) {
            echo '<p>Or : ' . $_SESSION['sawmill']['gold'] . '</p>';
        }
        ?>
    </div>
    <input type="submit" value="Construction scierie niveau <?php echo $_SESSION['sawmill-level'] + 1; ?>" class="button" />
</form>
<form id="form-extractor-construct" class="tooltip" action="../backend/constructSubstractResources.php?type=extractor&level=
    <?php echo $_SESSION['extractor-level']; ?>
    &foodNeeded=<?php echo $_SESSION['extractor']['food']; ?>
    &woodNeeded=<?php echo $_SESSION['extractor']['wood']; ?>
    &metalNeeded=<?php echo $_SESSION['extractor']['metal']; ?>
    &stoneNeeded=<?php echo $_SESSION['extractor']['stone']; ?>
    &goldNeeded=<?php echo $_SESSION['extractor']['gold']; ?>" method="POST">
    <div class="tooltiptext">
        <h3>Ville</h3>
        <p>Nourriture : <?php echo $_SESSION['extractor']['food']; ?></p>
        <?php if ($_SESSION['extractor']['wood'] > 0) {
            echo '<p>Bois : ' . $_SESSION['extractor']['wood'] . '</p>';
        }
        if ($_SESSION['extractor']['metal'] > 0) {
            echo '<p>Métal : ' . $_SESSION['extractor']['metal'] . '</p>';
        }
        if ($_SESSION['extractor']['stone'] > 0) {
            echo '<p>Pierre : ' . $_SESSION['extractor']['stone'] . '</p>';
        }
        if ($_SESSION['extractor']['gold'] > 0) {
            echo '<p>Or : ' . $_SESSION['extractor']['gold'] . '</p>';
        }
        ?>
    </div>
    <input type="submit" value="Construction extracteur niveau <?php echo $_SESSION['extractor-level'] + 1; ?>" class="button" />
</form>
<form id="form-quarry-construct" class="tooltip" action="../backend/constructSubstractResources.php?type=quarry&level=
    <?php echo $_SESSION['quarry-level']; ?>
    &foodNeeded=<?php echo $_SESSION['quarry']['food']; ?>
    &woodNeeded=<?php echo $_SESSION['quarry']['wood']; ?>
    &metalNeeded=<?php echo $_SESSION['quarry']['metal']; ?>
    &stoneNeeded=<?php echo $_SESSION['quarry']['stone']; ?>
    &goldNeeded=<?php echo $_SESSION['quarry']['gold']; ?>" method="POST">
    <div class="tooltiptext">
        <h3>Ville</h3>
        <p>Nourriture : <?php echo $_SESSION['quarry']['food']; ?></p>
        <?php if ($_SESSION['quarry']['wood'] > 0) {
            echo '<p>Bois : ' . $_SESSION['quarry']['wood'] . '</p>';
        }
        if ($_SESSION['quarry']['metal'] > 0) {
            echo '<p>Métal : ' . $_SESSION['quarry']['metal'] . '</p>';
        }
        if ($_SESSION['quarry']['stone'] > 0) {
            echo '<p>Pierre : ' . $_SESSION['quarry']['stone'] . '</p>';
        }
        if ($_SESSION['quarry']['gold'] > 0) {
            echo '<p>Or : ' . $_SESSION['quarry']['gold'] . '</p>';
        }
        ?>
    </div>
    <input type="submit" value="Construction carrière niveau <?php echo $_SESSION['quarry-level'] + 1; ?>" class="button" />
</form>
<form id="form-mine-construct" class="tooltip" action="../backend/constructSubstractResources.php?type=mine&level=
    <?php echo $_SESSION['mine-level']; ?>
    &foodNeeded=<?php echo $_SESSION['mine']['food']; ?>
    &woodNeeded=<?php echo $_SESSION['mine']['wood']; ?>
    &metalNeeded=<?php echo $_SESSION['mine']['metal']; ?>
    &stoneNeeded=<?php echo $_SESSION['mine']['stone']; ?>
    &goldNeeded=<?php echo $_SESSION['mine']['gold']; ?>" method="POST">
    <div class="tooltiptext">
        <h3>Ville</h3>
        <p>Nourriture : <?php echo $_SESSION['mine']['food']; ?></p>
        <?php if ($_SESSION['mine']['wood'] > 0) {
            echo '<p>Bois : ' . $_SESSION['mine']['wood'] . '</p>';
        }
        if ($_SESSION['mine']['metal'] > 0) {
            echo '<p>Métal : ' . $_SESSION['mine']['metal'] . '</p>';
        }
        if ($_SESSION['mine']['stone'] > 0) {
            echo '<p>Pierre : ' . $_SESSION['mine']['stone'] . '</p>';
        }
        if ($_SESSION['mine']['gold'] > 0) {
            echo '<p>Or : ' . $_SESSION['mine']['gold'] . '</p>';
        }
        ?>
    </div>
    <input type="submit" value="Construction mine niveau <?php echo $_SESSION['mine-level'] + 1; ?>" class="button" />
</form>