<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
//pour vider $_SESSION
$_SESSION = array();
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

    <h2>Annuaire</h2>
    <form action="backend/connexion.php" method="POST">

        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
        <br>

        <input type="submit" value="Connexion" class="button" />
    </form>
    <p><span>Pas encore inscrit ?</span><a href="inscription.html" class="button">Inscription</a></p>
</body>

</html>