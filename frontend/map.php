<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}

if (!isset($_SESSION['pseudo']) || empty($_SESSION['pseudo'])) {
    header('Location: ../index.php');
    exit();
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

    <?php include('../backend/trainingChecking.php'); ?>

    <?php include('trainingbuttons.php'); ?>



    <!-- <form action="../backend/connexion.php" method="POST" id="form-save-resources">
        <input type="submit" value="Sauvegarde ressources" class="button" />
    </form> -->

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
        <input type="submit" value="Mettre en stock" class="button" id="btn-stock" />
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

    echo ('<pre>');
    // var_dump($_SESSION);

    echo ('</pre>');

    ?>

    <script>
        let foodTown = <?php echo $_SESSION['town']['town-food']; ?>;
        let woodTown = <?php echo $_SESSION['town']['town-wood']; ?>;
        let metalTown = <?php echo $_SESSION['town']['town-metal']; ?>;
        let stoneTown = <?php echo $_SESSION['town']['town-stone']; ?>;
        let goldTown = <?php echo $_SESSION['town']['town-gold']; ?>;

        let castleFood = <?php echo $_SESSION['castle']['food']; ?>;
        let castleWood = <?php echo $_SESSION['castle']['wood']; ?>;
        let castleMetal = <?php echo $_SESSION['castle']['metal']; ?>;
        let castleStone = <?php echo $_SESSION['castle']['stone']; ?>;
        let castleGold = <?php echo $_SESSION['castle']['gold']; ?>;
        let farmFood = <?php echo $_SESSION['farm']['food']; ?>;
        let farmWood = <?php echo $_SESSION['farm']['wood']; ?>;
        let farmMetal = <?php echo $_SESSION['farm']['metal']; ?>;
        let farmStone = <?php echo $_SESSION['farm']['stone']; ?>;
        let farmGold = <?php echo $_SESSION['farm']['gold']; ?>;
        let sawmillFood = <?php echo $_SESSION['sawmill']['food']; ?>;
        let sawmillWood = <?php echo $_SESSION['sawmill']['wood']; ?>;
        let sawmillMetal = <?php echo $_SESSION['sawmill']['metal']; ?>;
        let sawmillStone = <?php echo $_SESSION['sawmill']['stone']; ?>;
        let sawmillGold = <?php echo $_SESSION['sawmill']['gold']; ?>;
        let extractorFood = <?php echo $_SESSION['extractor']['food']; ?>;
        let extractorWood = <?php echo $_SESSION['extractor']['wood']; ?>;
        let extractorMetal = <?php echo $_SESSION['extractor']['metal']; ?>;
        let extractorStone = <?php echo $_SESSION['extractor']['stone']; ?>;
        let extractorGold = <?php echo $_SESSION['extractor']['gold']; ?>;
        let quarryFood = <?php echo $_SESSION['quarry']['food']; ?>;
        let quarryWood = <?php echo $_SESSION['quarry']['wood']; ?>;
        let quarryMetal = <?php echo $_SESSION['quarry']['metal']; ?>;
        let quarryStone = <?php echo $_SESSION['quarry']['stone']; ?>;
        let quarryGold = <?php echo $_SESSION['quarry']['gold']; ?>;
        let mineFood = <?php echo $_SESSION['mine']['food']; ?>;
        let mineWood = <?php echo $_SESSION['mine']['wood']; ?>;
        let mineMetal = <?php echo $_SESSION['mine']['metal']; ?>;
        let mineStone = <?php echo $_SESSION['mine']['stone']; ?>;
        let mineGold = <?php echo $_SESSION['mine']['gold']; ?>;

        let barracksFood = <?php echo $_SESSION['barracks']['food']; ?>;
        let barracksWood = <?php echo $_SESSION['barracks']['wood']; ?>;
        let barracksMetal = <?php echo $_SESSION['barracks']['metal']; ?>;
        let barracksStone = <?php echo $_SESSION['barracks']['stone']; ?>;
        let barracksGold = <?php echo $_SESSION['barracks']['gold']; ?>;

        let workshopFood = <?php echo $_SESSION['workshop']['food']; ?>;
        let workshopWood = <?php echo $_SESSION['workshop']['wood']; ?>;
        let workshopMetal = <?php echo $_SESSION['workshop']['metal']; ?>;
        let workshopStone = <?php echo $_SESSION['workshop']['stone']; ?>;
        let workshopGold = <?php echo $_SESSION['workshop']['gold']; ?>;

        let archerFood = <?php echo $_SESSION['archer']['food']; ?>;
        let archerGold = <?php echo $_SESSION['archer']['gold']; ?>;
        let archerBow = <?php echo $_SESSION['archer']['bow']; ?>;

        let timeConstructCastle = <?php echo $_SESSION['castle']['timeConstruct']; ?>;
        let timeConstructFarm = <?php echo $_SESSION['farm']['timeConstruct']; ?>;
        let timeConstructSawmill = <?php echo $_SESSION['sawmill']['timeConstruct']; ?>;
        let timeConstructExtractor = <?php echo $_SESSION['extractor']['timeConstruct']; ?>;
        let timeConstructQuarry = <?php echo $_SESSION['quarry']['timeConstruct']; ?>;
        let timeConstructMine = <?php echo $_SESSION['mine']['timeConstruct']; ?>;

        let timeConstructBarracks = <?php echo $_SESSION['barracks']['timeConstruct']; ?>;

        let timeConstructWorkshop = <?php echo $_SESSION['workshop']['timeConstruct']; ?>;

        let timeTrainingArcher = <?php echo $_SESSION['archer']['timeConstruct']; ?>;

        let levelCastle = <?php echo $_SESSION['castle-level']; ?>;
        let levelFarm = <?php echo $_SESSION['farm-level']; ?>;
        let levelSawmill = <?php echo $_SESSION['sawmill-level']; ?>;
        let levelExtractor = <?php echo $_SESSION['extractor-level']; ?>;
        let levelQuarry = <?php echo $_SESSION['quarry-level']; ?>;
        let levelMine = <?php echo $_SESSION['mine-level']; ?>;
        let levelBarracks = <?php echo $_SESSION['barracks-level']; ?>;

        let levelWorkshop = <?php echo $_SESSION['workshop-level']; ?>;

        let levelArcher = <?php echo $_SESSION['archer-level']; ?>;

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