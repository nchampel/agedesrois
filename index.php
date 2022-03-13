<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}

// var_dump($_SESSION);
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

    <h2>Se connecter</h2>

    <p id="flash-message-index">
        <?php
        if (isset($_SESSION['flash'])) {
            if (!empty($_SESSION['flash'])) {
                echo $_SESSION['flash'];
                $_SESSION['flash'] = '';
            }
        }
        $_SESSION[] = array();
        session_destroy();
        // print_r($_SESSION);
        ?>
    </p>

    <form action="backend/connexion.php" method="POST">

        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
        <br>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required>

        <input type="submit" value="Connexion" class="button" />
    </form>
    <p><span>Pas encore inscrit ?</span><a href="inscription.php" class="button">Inscription</a></p>
    <p>Résumé du jeu :</p>
    <p>Construction de bâtiments, récupération de ressources, recrutement d'héros, augmentation de leur niveau, parcourir la carte pour récupérer des ressources pour se battre.</p>
    <p> But du jeu : battre le dragon de la carte</p>
    <h2>L'événement de Noël est terminé ! Merci pour votre participation.</h2>
</body>

</html>