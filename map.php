<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
echo ('<pre>');
// var_dump($_SESSION);
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
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    if (isset($_SESSION['flash'])) {
        if (!empty($_SESSION['flash'])) {
            echo $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
    }
    ?>

    <p id="waiting-message"></p>

    <!-- <h1>Salut <?php //echo $_SESSION['player']; 
                    ?> !</h1>
    <p>Nourriture dans la ville : <?php //echo $player['player']; 
                                    ?> </p> -->
    <h1>Salut <?php echo $_SESSION['pseudo']; ?> !</h1>

    <p class="tooltip">Nourriture dans la ville : <span id="town-food"><?php echo number_format((float)$_SESSION['town']['town-food'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (1 + (int)$_SESSION['farm-level'] * 5), 0, ',', ' ') . ' /h'; ?></span> </p>
    <p class="tooltip">Bois dans la ville : <span id="town-wood"><?php echo number_format((float)$_SESSION['town']['town-wood'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (1 + (int)$_SESSION['sawmill-level'] * 4), 0, ',', ' ') . ' /h'; ?></span> </p>
    <p class="tooltip">Métal dans la ville : <span id="town-metal"><?php echo number_format((float)$_SESSION['town']['town-metal'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (0 + (int)$_SESSION['extractor-level'] * 3), 0, ',', ' ') . ' /h'; ?></span> </p>
    <p class="tooltip">Pierre dans la ville : <span id="town-stone"><?php echo number_format((float)$_SESSION['town']['town-stone'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (0 + (int)$_SESSION['quarry-level'] * 2), 0, ',', ' ') . ' /h'; ?></span> </p>
    <p class="tooltip">Or dans la ville : <span id="town-gold"><?php echo number_format((float)$_SESSION['town']['town-gold'], 0, ',', ' '); ?></span><span class="tooltiptext"><?php echo number_format(360 * (0 + (int)$_SESSION['mine-level'] * 1), 0, ',', ' ') . ' /h'; ?></span> </p>

    <p>Nourriture en stock : <span id="stock-food"><?php echo number_format((float)$_SESSION['stock']['stock-food'], 0, ',', ' '); ?></span> </p>
    <p>Bois en stock : <span id="stock-wood"><?php echo number_format((float)$_SESSION['stock']['stock-wood'], 0, ',', ' '); ?></span> </p>
    <p>Métal en stock : <span id="stock-metal"><?php echo number_format((float)$_SESSION['stock']['stock-metal'], 0, ',', ' '); ?></span> </p>
    <p>Pierre en stock : <span id="stock-stone"><?php echo number_format((float)$_SESSION['stock']['stock-stone'], 0, ',', ' '); ?></span> </p>
    <p>Or en stock : <span id="stock-gold"><?php echo number_format((float)$_SESSION['stock']['stock-gold'], 0, ',', ' '); ?></span> </p>

    <p><?php echo ucfirst($_SESSION['farm']['name']); ?> niveau <span id="farm-level"><?php echo $_SESSION['farm-level']; ?></span> </p>
    <p><?php echo ucfirst($_SESSION['sawmill']['name']); ?> niveau <span id="sawmill-level"><?php echo $_SESSION['sawmill-level']; ?></span> </p>
    <p><?php echo ucfirst($_SESSION['extractor']['name']); ?> niveau <span id="extractor-level"><?php echo $_SESSION['extractor-level']; ?></span> </p>
    <p><?php echo ucfirst($_SESSION['quarry']['name']); ?> niveau <span id="quarry-level"><?php echo $_SESSION['quarry-level']; ?></span> </p>
    <p><?php echo ucfirst($_SESSION['mine']['name']); ?> niveau <span id="mine-level"><?php echo $_SESSION['mine-level']; ?></span> </p>
    <!-- <a href="map1.php">map 1</a> -->
    <!-- <button id="construct-farm" onclick="construction(<?php //echo ($_SESSION['farm']['food'] . ', ' . $_SESSION['farm']['timeConstruct']); 
                                                            ?>)">Construire ferme</button> -->

    <form id="form-farm-construct" class="tooltip" action="backend/constructSubstractResources.php?type=farm&level=
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
    <form id="form-sawmill-construct" class="tooltip" action="backend/constructSubstractResources.php?type=sawmill&level=
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
    <form id="form-extractor-construct" class="tooltip" action="backend/constructSubstractResources.php?type=extractor&level=
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
    <form id="form-quarry-construct" class="tooltip" action="backend/constructSubstractResources.php?type=quarry&level=
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
    <form id="form-mine-construct" class="tooltip" action="backend/constructSubstractResources.php?type=mine&level=
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

    <form action="backend/connexion.php" method="POST" id="form-save-resources">
        <input type="submit" value="Sauvegarde ressources" class="button" />
    </form>

    <p>Ressources à transférer dans la réserve</p>
    <form id="form-stock" action="backend/stock.php" method="POST">
        <label for="stock-food">Nourriture</label>
        <input type="text" name="stock-food" id="stock-food" value="0">
        <label for="stock-wood">Bois</label>
        <input type="text" name="stock-wood" id="stock-wood" value="0">
        <label for="stock-metal">Métal</label>
        <input type="text" name="stock-metal" id="stock-metal" value="0">
        <label for="stock-stone">Pierre</label>
        <input type="text" name="stock-stone" id="stock-stone" value="0">
        <label for="stock-gold">Or</label>
        <input type="text" name="stock-gold" id="stock-gold" value="0">
        <input type="submit" value="Mettre en stock" class="button" />
    </form>

    <?php include('carte.php'); ?>

    <script>
        let timeConstructFarm = <?php echo $_SESSION['farm']['timeConstruct']; ?>;
        let timeConstructSawmill = <?php echo $_SESSION['sawmill']['timeConstruct']; ?>;
        let timeConstructExtractor = <?php echo $_SESSION['extractor']['timeConstruct']; ?>;
        let timeConstructQuarry = <?php echo $_SESSION['quarry']['timeConstruct']; ?>;
        let timeConstructMine = <?php echo $_SESSION['mine']['timeConstruct']; ?>;

        let levelFarm = <?php echo $_SESSION['farm-level']; ?>;
        let levelSawmill = <?php echo $_SESSION['sawmill-level']; ?>;
        let levelExtractor = <?php echo $_SESSION['extractor-level']; ?>;
        let levelQuarry = <?php echo $_SESSION['quarry-level']; ?>;
        let levelMine = <?php echo $_SESSION['mine-level']; ?>;
    </script>
    <script src="js/time.js"></script>
    <script src="js/construct.js"></script>
</body>

</html>