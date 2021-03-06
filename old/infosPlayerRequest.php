<?php

$rqt = "SELECT * from player where pseudo = :id";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':id', $user);
    //On l'execute
    $statement->execute();
    // On récupère l'ensemble des résultats dans un tableau
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (empty($results[0]['pseudo'])) {
        header('Location: ../index.php');
        exit();
    }
    $_SESSION['pseudo'] = $results[0]['pseudo'];
    $_SESSION['town']['town-food'] = $results[0]['town_food'];
    $_SESSION['town']['town-wood'] = $results[0]['town_wood'];
    $_SESSION['town']['town-metal'] = $results[0]['town_metal'];
    $_SESSION['town']['town-stone'] = $results[0]['town_stone'];
    $_SESSION['town']['town-gold'] = $results[0]['town_gold'];
    $_SESSION['town']['town-bow'] = $results[0]['town_bow'];
    $_SESSION['town']['town-crossbow'] = $results[0]['town_crossbow'];
    $_SESSION['stock']['stock-food'] = $results[0]['stock_food'];
    $_SESSION['stock']['stock-wood'] = $results[0]['stock_wood'];
    $_SESSION['stock']['stock-metal'] = $results[0]['stock_metal'];
    $_SESSION['stock']['stock-stone'] = $results[0]['stock_stone'];
    $_SESSION['stock']['stock-gold'] = $results[0]['stock_gold'];
    $_SESSION['castle-level'] = $results[0]['castle_level'];
    $_SESSION['farm-level'] = $results[0]['farm_level'];
    $_SESSION['sawmill-level'] = $results[0]['sawmill_level'];
    $_SESSION['extractor-level'] = $results[0]['extractor_level'];
    $_SESSION['quarry-level'] = $results[0]['quarry_level'];
    $_SESSION['mine-level'] = $results[0]['mine_level'];
    $_SESSION['barracks-level'] = $results[0]['barracks_level'];
    $_SESSION['workshop-level'] = $results[0]['workshop_level'];
    $_SESSION['archer-level'] = $results[0]['archer_level'];
} catch (Exception $exception) {
    echo $exception->getMessage();
}
