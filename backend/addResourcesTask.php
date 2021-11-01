<?php

use Models\MySQL;

include_once('Models/MySQL.php');

// récupérer toutes les id
// avec un foreach, récupérer les ressources, les niveaux des constructions (cf Ranking.php), calculer les ajouts, mettre à jour

$tool = 10000;
$id = 1;

$rqt = "UPDATE town set town_tool = :tool where id_player = :id";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':tool', $tool);
    //On l'execute
    $result = $statement->execute();
    //session_destroy();
    // include('connexion.php');
    // echo ('test après');

    // $_SESSION['town-food'] = $resource;
    // echo ('food');
    // echo ($_SESSION['town-food']);
    // header('Location: ../index.php');
    // exit();
    // On récupère l'ensemble des résultats dans un tableau
    //$results = $statement->fetchAll(PDO::FETCH_ASSOC);
    //$result = $statement->getAttribute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
