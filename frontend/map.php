<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
include_once('../backend/resourcesRecoveringMap.php');
echo ('<pre>');
// var_dump($_SESSION);
// echo 'true';
// echo true;
// echo 'false';
// echo false;
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
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <!-- <progress id="progress-bar" value="60" max="100"></progress> -->
    <div id="div-progress-bar">
        <div id="progress-bar"></div>
    </div>
    <p id="flash-message">
        <?php
        if (isset($_SESSION['flash'])) {
            if (!empty($_SESSION['flash'])) {
                echo $_SESSION['flash'];
                $_SESSION['flash'] = '';
            }
        }
        ?>
    </p>


    <!-- <p id="waiting-message"></p> -->

    <!-- <h1>Salut <?php //echo $_SESSION['player']; 
                    ?> !</h1>
    <p>Nourriture dans la ville : <?php //echo $player['player']; 
                                    ?> </p> -->
    <h1 id="test">Salut <span id="pseudo"><?php echo $_SESSION['pseudo']; ?></span> !</h1>

    <?php include('townresources.php'); ?>

    <br>

    <?php include('stockresources.php'); ?>

    <?php include('informations.php'); ?>

    <?php include('constructionlevels.php'); ?>

    <?php include('constructionbuttons.php'); ?>

    <?php include('trainingbuttons.php'); ?>



    <form action="../backend/connexion.php" method="POST" id="form-save-resources">
        <input type="submit" value="Sauvegarde ressources" class="button" />
    </form>

    <p>Ressources à transférer dans la réserve</p>
    <form id="form-stock" action="../backend/stock.php" method="POST">
        <label for="transfer-food">Nourriture</label>
        <input type="text" name="transfer-food" id="transfer-food" value="0">
        <label for="transfer-wood">Bois</label>
        <input type="text" name="transfer-wood" id="transfer-wood" value="0">
        <label for="transfer-metal">Métal</label>
        <input type="text" name="transfer-metal" id="transfer-metal" value="0">
        <label for="transfer-stone">Pierre</label>
        <input type="text" name="transfer-stone" id="transfer-stone" value="0">
        <label for="transfer-gold">Or</label>
        <input type="text" name="transfer-gold" id="transfer-gold" value="0">
        <input type="submit" value="Mettre en stock" class="button" />
    </form>

    <?php include('world.php'); ?>

    <?php
    $constructsFromTownResources = ['farm', 'sawmill', 'extractor', 'quarry', 'mine'];
    $constructsFromStockResources = ['workshop'];

    foreach ($constructsFromTownResources as $construct) {
        switch ($construct) {
            case 'farm':
                $constructIsOK = 'farm-construct-isOK';
                break;
            case 'sawmill':
                $constructIsOK = 'sawmill-construct-isOK';
                break;
            case 'extractor':
                $constructIsOK = 'extractor-construct-isOK';
                break;
            case 'quarry':
                $constructIsOK = 'quarry-construct-isOK';
                break;
            case 'mine':
                $constructIsOK = 'mine-construct-isOK';
                break;
        }
        if (
            $_SESSION['town']['town-food'] >= $_SESSION[$construct]['food'] &&
            $_SESSION['town']['town-wood'] >= $_SESSION[$construct]['wood'] &&
            $_SESSION['town']['town-metal'] >= $_SESSION[$construct]['metal'] &&
            $_SESSION['town']['town-stone'] >= $_SESSION[$construct]['stone'] &&
            $_SESSION['town']['town-gold'] >= $_SESSION[$construct]['gold']
        ) {
            $_SESSION[$constructIsOK] = 'true';
        } else {
            $_SESSION[$constructIsOK] = 'false';
        }
    }

    foreach ($constructsFromStockResources as $construct) {
        switch ($construct) {
            case 'workshop':
                $constructIsOK = 'workshop-construct-isOK';
                break;
                // case 'sawmill':
                //     $constructIsOK = 'sawmill-construct-isOK';
                //     break;
                // case 'extractor':
                //     $constructIsOK = 'extractor-construct-isOK';
                //     break;
                // case 'quarry':
                //     $constructIsOK = 'quarry-construct-isOK';
                //     break;
                // case 'mine':
                //     $constructIsOK = 'mine-construct-isOK';
                //     break;
        }
        if (
            $_SESSION['stock']['stock-food'] >= $_SESSION[$construct]['food'] &&
            $_SESSION['stock']['stock-wood'] >= $_SESSION[$construct]['wood'] &&
            $_SESSION['stock']['stock-metal'] >= $_SESSION[$construct]['metal'] &&
            $_SESSION['stock']['stock-stone'] >= $_SESSION[$construct]['stone'] &&
            $_SESSION['stock']['stock-gold'] >= $_SESSION[$construct]['gold']
        ) {
            $_SESSION[$constructIsOK] = 'true';
        } else {
            $_SESSION[$constructIsOK] = 'false';
        }
    }

    // if (
    //     $_SESSION['stock']['stock-food'] >= $_SESSION[$construct]['food'] &&
    //     $_SESSION['stock']['stock-wood'] >= $_SESSION[$construct]['wood'] &&
    //     $_SESSION['stock']['stock-metal'] >= $_SESSION[$construct]['metal'] &&
    //     $_SESSION['stock']['stock-stone'] >= $_SESSION[$construct]['stone'] &&
    //     $_SESSION['stock']['stock-gold'] >= $_SESSION[$construct]['gold']
    // ) {
    //     $_SESSION[$constructIsOK] = 'true';
    // } else {
    //     $_SESSION[$constructIsOK] = 'false';
    // }

    if (isset($_POST['stock-food'])) {
        echo filter_var($_POST['stock-food'], FILTER_SANITIZE_STRING);
    }

    ?>

    <script>
        let foodTown = <?php echo $_SESSION['town']['town-food']; ?>;
        let woodTown = <?php echo $_SESSION['town']['town-wood']; ?>;
        let metalTown = <?php echo $_SESSION['town']['town-metal']; ?>;
        let stoneTown = <?php echo $_SESSION['town']['town-stone']; ?>;
        let goldTown = <?php echo $_SESSION['town']['town-gold']; ?>;

        let timeConstructFarm = <?php echo $_SESSION['farm']['timeConstruct']; ?>;
        let timeConstructSawmill = <?php echo $_SESSION['sawmill']['timeConstruct']; ?>;
        let timeConstructExtractor = <?php echo $_SESSION['extractor']['timeConstruct']; ?>;
        let timeConstructQuarry = <?php echo $_SESSION['quarry']['timeConstruct']; ?>;
        let timeConstructMine = <?php echo $_SESSION['mine']['timeConstruct']; ?>;

        let timeConstructWorkshop = <?php echo $_SESSION['workshop']['timeConstruct']; ?>;

        let timeTrainingArcher = <?php echo $_SESSION['archer']['timeConstruct']; ?>;

        let levelFarm = <?php echo $_SESSION['farm-level']; ?>;
        let levelSawmill = <?php echo $_SESSION['sawmill-level']; ?>;
        let levelExtractor = <?php echo $_SESSION['extractor-level']; ?>;
        let levelQuarry = <?php echo $_SESSION['quarry-level']; ?>;
        let levelMine = <?php echo $_SESSION['mine-level']; ?>;

        let levelWorkshop = <?php echo $_SESSION['workshop-level']; ?>;

        let isConstructOKFarm = JSON.parse(<?php echo $_SESSION['farm-construct-isOK']; ?>);
        let isConstructOKSawmill = JSON.parse(<?php echo $_SESSION['sawmill-construct-isOK']; ?>);
        let isConstructOKExtractor = JSON.parse(<?php echo $_SESSION['extractor-construct-isOK']; ?>);
        let isConstructOKQuarry = JSON.parse(<?php echo $_SESSION['quarry-construct-isOK']; ?>);
        let isConstructOKMine = JSON.parse(<?php echo $_SESSION['mine-construct-isOK']; ?>);

        let isConstructOKWorkshop = JSON.parse(<?php echo $_SESSION['workshop-construct-isOK']; ?>);

        //let isTrainingOKArcher = JSON.parse(<?php //echo $_SESSION['archer-training-isOK'];
                                                ?>);
        let isTrainingOKArcher = true;
        // let isStockResourcesOK = true;
    </script>

    <script src="../js/design.js"></script>
    <script src="../js/time.js"></script>
    <script src="../js/construct.js"></script>

</body>

</html>