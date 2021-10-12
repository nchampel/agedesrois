<?php
header('Access-Control-Allow-Origin: *');
if (session_status() != PHP_SESSION_ACTIVE) {
    //var_dump('test');
    session_start();
    //$_SESSION['pseudo'] = "Lucie";
}
$type = $_GET['type'];
$levelConstruct = (int)$_GET['level'];
$pseudo = $_SESSION['pseudo'];

// $type = 'farm';
// $level = 10;



switch ($type) {
    case 'castle':
        $typeColumn = 'castle_level';
        $typeLevel = 'castle-level';
        break;
    case 'farm':
        $typeColumn = 'farm_level';
        $typeLevel = 'farm-level';
        break;
    case 'sawmill':
        $typeColumn = 'sawmill_level';
        $typeLevel = 'sawmill-level';
        break;
    case 'extractor':
        $typeColumn = 'extractor_level';
        $typeLevel = 'extractor-level';
        break;
    case 'quarry':
        $typeColumn = 'quarry_level';
        $typeLevel = 'quarry-level';
        break;
    case 'mine':
        $typeColumn = 'mine_level';
        $typeLevel = 'mine-level';
        break;
    case 'barracks':
        $typeColumn = 'barracks_level';
        $typeLevel = 'barracks-level';
        break;
    case 'workshop':
        $typeColumn = 'workshop_level';
        $typeLevel = 'workshop-level';
        break;
    case 'archer':
        $typeColumn = 'archer_level';
        $typeLevel = 'archer-level';
        break;
}

$castleLevel = $_SESSION['castle-level'];
var_dump((int)$castleLevel);
echo ' ';
var_dump((int)$_SESSION[$typeLevel]);
echo (int)$castleLevel <= (int)$_SESSION[$typeLevel];

if ((int)$castleLevel <= (int)$_SESSION[$typeLevel] && $type != 'castle') {
    $_SESSION['flash'] = 'Niveau de château insuffisant';
    header('Location: ../frontend/map.php');
    exit();
} else if ((int)$castleLevel > (int)$_SESSION[$typeLevel]) {
    $levelConstruct++;
} else if ($typeLevel = 'castle-level') {
    $levelConstruct++;
}

include_once('constructSubstractResources.php');

include_once('db.php');
if (!isset($connexion)) {
    $connexion = new PDO($url, $userDB, $pass);
    // pour afficher les erreurs dans le catch
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}


$rqt = "UPDATE player set " . $typeColumn . "= :level where pseudo = :pseudo";
//$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
//On prépare notre requête. ça nous renvoie un objet qui est notre requête préparée prête à être executée
try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':level', $levelConstruct);
    //On l'execute
    $result = $statement->execute();
    switch ($type) {
        case 'castle':
            $_SESSION['castle-level'] = $levelConstruct;
            break;
        case 'farm':
            $_SESSION['farm-level'] = $levelConstruct;
            break;
        case 'sawmill':
            $_SESSION['sawmill-level'] = $levelConstruct;
            break;
        case 'extractor':
            $_SESSION['extractor-level'] = $levelConstruct;
            break;
        case 'quarry':
            $_SESSION['quarry-level'] = $levelConstruct;
            break;
        case 'mine':
            $_SESSION['mine-level'] = $levelConstruct;
            break;
        case 'barracks':
            $_SESSION['barracks-level'] = $levelConstruct;
            break;
        case 'workshop':
            $_SESSION['workshop-level'] = $levelConstruct;
            break;
        case 'archer':
            $_SESSION['archer-level'] = $levelConstruct;
            break;
    }

    // echo ('test avant');
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

$_SESSION['flash'] = 'Construction finie';

header('Location: ../frontend/map.php');
exit();
