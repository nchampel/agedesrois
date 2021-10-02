<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
//var_dump($_SESSION);
//$player = $_SESSION['player'];

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

    <!-- <h1>Salut <?php echo $_SESSION['player']; ?> !</h1>
    <p>Nourriture dans la ville : <?php //echo $player['player']; 
                                    ?> </p> -->
    <h1>Salut <?php echo $_SESSION['pseudo']; ?> !</h1>
    <p>Nourriture dans la ville : <span id="town-food"><?php echo $_SESSION['town-food']; ?></span> </p>
    <!-- <a href="town.php">Ma Ville</a> -->
    <script src="js/time.js"></script>
</body>

</html>