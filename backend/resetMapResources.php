<?php

use Models\MySQL;

include_once('Models/MySQL.php');

$rqt = "SELECT id, using_date FROM map_player WHERE is_active = false";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    //On l'execute
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    // print_r($results);
    // $dateUsingResource = $results[0]['using_date'];
    // $date1 = new \DateTime($dateUsingResource);
    foreach ($results as $result) {
        $dateUsingResource = $result['using_date'];
        $date = date("Y-m-d H:i:s");
        // print_r(strtotime($result['using_date']));
        $timeDateActual = strtotime($date);
        $timeDate = strtotime($dateUsingResource);
        $timeDiff = $timeDateActual - $timeDate;
        if ($timeDiff > 600) {
            // echo 'réussi';
            $id = $result['id'];
            $rqt = "UPDATE map_player set is_active = true WHERE id = :id";
            //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
            //On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
            try {
                $statement = MySQL::getInstance()->prepare($rqt);
                $statement->bindParam(':id', $id);
                //On l'execute
                $result = $statement->execute();
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
        }
        // echo 'raté';
    }

    // $date2 = new \DateTime($date);
    // print_r($timeDiff);
    // print_r($date1->diff($date2)->format("%i"));
    // print_r($date1->diff($date2)->format("%H%i"));

} catch (Exception $exception) {
    echo $exception->getMessage();
}

// $rqt = "UPDATE map_player set is_active = true where type_item IN ('bois', 'nourriture', 'pierre', 'metal')";
