<?php

session_start();

$types = ['ferme', 'scierie', 'extracteur', 'carriere', 'mine', 'atelier'];

foreach ($types as $typeItem) {
    switch ($typeItem) {
        case 'ferme':
            $level = $_SESSION['farm-level'];
            $type = 'farm';
            break;
        case 'scierie':
            $level = $_SESSION['sawmill-level'];
            $type = 'sawmill';
            break;
        case 'extracteur':
            $level = $_SESSION['extractor-level'];
            $type = 'extractor';
            break;
        case 'carriere':
            $level = $_SESSION['quarry-level'];
            $type = 'quarry';
            break;
        case 'mine':
            $level = $_SESSION['mine-level'];
            $type = 'mine';
            break;
        case 'atelier':
            $level = $_SESSION['workshop-level'];
            $type = 'workshop';
            break;
    }
    // $typeItem = 'ferme';
    // var_dump($level);

    $rqt = "SELECT * from items where type_item = :typeItem and level_item = :level";
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
        $_SESSION[$type]['food'] = $results1[0]['food'];
        $_SESSION[$type]['wood'] = $results1[0]['wood'];
        $_SESSION[$type]['metal'] = $results1[0]['metal'];
        $_SESSION[$type]['stone'] = $results1[0]['stone'];
        $_SESSION[$type]['gold'] = $results1[0]['gold'];
        $_SESSION[$type]['timeConstruct'] = $results1[0]['time_construct'];
        $_SESSION[$type]['name'] = $results1[0]['type_item'];
        if ($type = 'quarry') {
            $_SESSION[$type]['name'] = "carrière";
        }
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}
