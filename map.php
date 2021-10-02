<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
echo ('<pre>');
var_dump($_SESSION);
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
    <link rel="stylesheet" href="style.css">
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

    <!-- <h1>Salut <?php //echo $_SESSION['player']; 
                    ?> !</h1>
    <p>Nourriture dans la ville : <?php //echo $player['player']; 
                                    ?> </p> -->
    <h1>Salut <?php echo $_SESSION['pseudo']; ?> !</h1>
    <p>Nourriture dans la ville : <span id="town-food"><?php echo $_SESSION['town']['town-food']; ?></span> </p>
    <p>Bois dans la ville : <span id="town-wood"><?php echo $_SESSION['town']['town-wood']; ?></span> </p>
    <p><?php echo ucfirst($_SESSION['farm']['name']); ?> niveau <span id="farm-level"><?php echo $_SESSION['farm-level']; ?></span> </p>
    <p><?php echo ucfirst($_SESSION['sawmill']['name']); ?> niveau <span id="sawmill-level"><?php echo $_SESSION['sawmill-level']; ?></span> </p>
    <!-- <a href="map1.php">map 1</a> -->
    <!-- <button id="construct-farm" onclick="construction(<?php //echo ($_SESSION['farm']['food'] . ', ' . $_SESSION['farm']['timeConstruct']); 
                                                            ?>)">Construire ferme</button> -->
    <form id="form-farm-construct" action="backend/constructSubstractResources.php?type=farm&level=<?php echo $_SESSION['farm-level']; ?>&foodNeeded=<?php echo $_SESSION['farm']['food']; ?>&foodNeeded=<?php echo $_SESSION['farm']['food']; ?>" method="POST">
        <input type="submit" value="Construction ferme" class="button" />
    </form>
    <form id="form-sawmill-construct" action="backend/constructSubstractResources.php?type=sawmill&level=<?php echo $_SESSION['sawmill-level']; ?>&foodNeeded=<?php echo $_SESSION['sawmill']['food']; ?>&woodNeeded=<?php echo $_SESSION['sawmill']['wood']; ?>" method="POST">
        <input type="submit" value="Construction scierie" class="button" />
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
        <input type="submit" value="Mettre en stock" class="button" />
    </form>
    <script>
        let timeConstructFarm = <?php echo $_SESSION['farm']['timeConstruct']; ?>;
        let timeConstructSawmill = <?php echo $_SESSION['sawmill']['timeConstruct']; ?>;
        let levelFarm = <?php echo $_SESSION['farm-level']; ?>;
        let levelSawmill = <?php echo $_SESSION['sawmill-level']; ?>;
    </script>
    <script src="js/time.js"></script>
    <script src="js/construct.js"></script>
</body>

</html>