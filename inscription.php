<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
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

    <h2>S'inscrire</h2>

    <p id="flash-message-inscription">
        <?php
        if (isset($_SESSION['flash'])) {
            if (!empty($_SESSION['flash'])) {
                echo $_SESSION['flash'];
                $_SESSION['flash'] = '';
            }
        }
        session_destroy();
        ?>
    </p>

    <form action="backend/inscription.php" method="POST">

        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
        <br>
        <input type="password" name="password1" id="password1" placeholder="Mot de passe" required>
        <br>
        <input type="password" name="password2" id="password2" placeholder="Retaper le mot de passe" required>
        <br>
        <input type="submit" value="S'inscrire" class="button" />
    </form>
    <p><span>Déjà inscrit ?</span><a href="index.php" class="button">Connexion</a></p>
</body>

</html>