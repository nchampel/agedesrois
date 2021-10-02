<?php

$typeItem = 'ferme';

switch ($typeItem) {
    case 'ferme':
        $level = $_SESSION['farm-level'];
}

$typeItem = 'ferme';
var_dump($level);

$rqt = "SELECT * from informations where type_item = :typeItem and level_item = :level";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':typeItem', $typeItem);
    $statement->bindParam(':level', $level);
    //On l'execute
    $statement->execute();

    // On récupère l'ensemble des résultats dans un tableau
    $results1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($results1);
    $_SESSION['farm']['food'] = $results1[0]['food'];
    $_SESSION['farm']['timeConstruct'] = $results1[0]['time_construct'];
    $_SESSION['farm']['name'] = $results1[0]['type_item'];
} catch (Exception $exception) {
    echo $exception->getMessage();
}
