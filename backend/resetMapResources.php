<?php
$rqt = "UPDATE map_player set is_active = true where type_item IN ('bois', 'nourriture')";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = MySQL::getInstance()->prepare($rqt);
    //On l'execute
    $result = $statement->execute();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
