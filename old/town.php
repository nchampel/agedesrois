<?php

header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>L'âge des Rois - Ville</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Salut <?php echo $_SESSION['pseudo']; ?> !</h1>
    <a href="map.php">Mon pays</a>
</body>

</html>