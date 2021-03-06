<?php

namespace Models;

// include_once('MySQL.php');
spl_autoload_register(function ($class_name) {
    // echo $class_name;
    if ($class_name == 'Models\MySQL') {
        $class_name = 'MySQL';
        include(/*'Models/Constructs' .*/$class_name . '.php');
    }
    if ($class_name != 'MySQL') {
        $transf = str_replace('\\', '/', $class_name);
        include(/*'Models/Constructs' .*/$transf . '.php');
        // include('Models/Constructs/' . $transf . '.php');
    }
});


class HandleResources
{
    static function addTownResource($type, int $resource, int $id)
    {
        $typeColumn = 'town_' . $type;
        $setter = 'setTown_' . $type;
        $getter = 'getTown_' . $type;
        $amount = $resource + $_SESSION['player']->$getter();
        $rqt = "UPDATE town set " . $typeColumn . " = :amount where id_player = :id";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':amount', $amount);
            //On l'execute
            $result = $statement->execute();

            $_SESSION['player']->$setter($resource);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    static function addMapResource($type, int $resource, int $id)
    {
        $typeColumn = 'town_' . $type;

        $rqt = "SELECT " . $typeColumn . " from town where id_player = :id";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            //On l'execute
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $resourceInTown = $result[$typeColumn];
            // $_SESSION['player']->$setter($resource);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        $amount = $resource + $resourceInTown;
        $rqt = "UPDATE town set " . $typeColumn . " = :amount where id_player = :id";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':amount', $amount);
            //On l'execute
            $result = $statement->execute();
            // echo $amount;
            // $_SESSION['player']->$setter($resource);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    static function addMapObject($type, int $resource, int $id)
    {
        $typeColumn = 'town_' . $type;

        $rqt = "SELECT " . $typeColumn . " from town where id_player = :id";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            //On l'execute
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $resourceInTown = $result[$typeColumn];
            // $_SESSION['player']->$setter($resource);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        $amount = $resource + $resourceInTown;
        $rqt = "SELECT level_christmas_elf from level_army where id_player = :id";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            //On l'execute
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $levelElf = $result['level_christmas_elf'];
            // $_SESSION['player']->$setter($resource);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        if ($amount == 6 && $levelElf == 0) {
            $rqt = "UPDATE level_army set level_christmas_elf = 1 where id_player = :id";
            try {
                $statement = MySQL::getInstance()->prepare($rqt);
                $statement->bindParam(':id', $id);
                //On l'execute
                $statement->execute();
                // $_SESSION['player']->$setter($resource);
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
            $amount = 0;
        }
        $rqt = "UPDATE town set " . $typeColumn . " = :amount where id_player = :id";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':amount', $amount);
            //On l'execute
            $result = $statement->execute();
            // echo $amount;
            // $_SESSION['player']->$setter($resource);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    static function substractConstructTown($foodNeeded, $woodNeeded, $metalNeeded, $stoneNeeded, $goldNeeded, $id, $player)
    {

        HandleResources::townResourcesRecovering($id, $player);

        if (
            $_SESSION['player']->getTown_food() < $foodNeeded ||
            $_SESSION['player']->getTown_wood() < $woodNeeded ||
            $_SESSION['player']->getTown_metal() < $metalNeeded ||
            $_SESSION['player']->getTown_stone() < $stoneNeeded ||
            $_SESSION['player']->getTown_gold() < $goldNeeded
        ) {
            $_SESSION['flash'] = 'Construction annul??e car pas assez de ressources en ville';
            ManagerGame::createLog($_SESSION['flash'], $id);
            header('Location: ../frontend/map.php');
            exit();
        }

        // echo ('apr??s test');

        $food = $_SESSION['player']->getTown_food() - $foodNeeded;
        $wood = $_SESSION['player']->getTown_wood() - $woodNeeded;
        $metal = $_SESSION['player']->getTown_metal() - $metalNeeded;
        $stone = $_SESSION['player']->getTown_stone() - $stoneNeeded;
        $gold = $_SESSION['player']->getTown_gold() - $goldNeeded;
        // $food = (int)$_GET['food'];

        // $pseudo = $_SESSION['pseudo'];


        $rqt = "UPDATE town set town_food = :food, town_wood = :wood, town_metal = :metal, town_stone = :stone, town_gold = :gold where id_player = :id";
        //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
        //On pr??pare notre requ??te. ??a nous renvoie un objet qui est notre requ??te pr??par??e pr??te ?? ??tre execut??e
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':food', $food);
            $statement->bindParam(':wood', $wood);
            $statement->bindParam(':metal', $metal);
            $statement->bindParam(':stone', $stone);
            $statement->bindParam(':gold', $gold);
            //On l'execute
            $result = $statement->execute();
            // echo ('test avant');
            // $_SESSION['town']['town-food'] = $food;
            // $_SESSION['town']['town-wood'] = $wood;
            // $_SESSION['town']['town-metal'] = $metal;
            // $_SESSION['town']['town-stone'] = $stone;
            // $_SESSION['town']['town-gold'] = $gold;
            $_SESSION['player']->setTown_food($food);
            $_SESSION['player']->setTown_wood($wood);
            $_SESSION['player']->setTown_metal($metal);
            $_SESSION['player']->setTown_stone($stone);
            $_SESSION['player']->setTown_gold($gold);
            //session_destroy();
            // include('connexion.php');
            // echo ('test apr??s');

            // $_SESSION['town-food'] = $resource;
            // echo ('food');
            // echo ($_SESSION['town-food']);
            // header('Location: ../index.php');
            // exit();
            // On r??cup??re l'ensemble des r??sultats dans un tableau
            //$results = $statement->fetchAll(PDO::FETCH_ASSOC);
            //$result = $statement->getAttribute();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

        // sleep(10);
        // include_once('construct.php');
        //met en $_session les valeurs pour le niveau suivant
        // include_once('resourcesNeeded.php');
        HandleResources::resourcesNeeded();
    }

    static function substractConstructStock($foodNeeded, $woodNeeded, $metalNeeded, $stoneNeeded, $goldNeeded, $id)
    {
        if (
            $_SESSION['player']->getStock_food() < $foodNeeded ||
            $_SESSION['player']->getStock_wood() < $woodNeeded ||
            $_SESSION['player']->getStock_metal() < $metalNeeded ||
            $_SESSION['player']->getStock_stone() < $stoneNeeded ||
            $_SESSION['player']->getStock_gold() < $goldNeeded
        ) {
            $_SESSION['flash'] = 'Construction annul??e car pas assez de ressources en stock';
            ManagerGame::createLog($_SESSION['flash'], $id);
            header('Location: ../frontend/map.php');
            exit();
        }

        // echo ('apr??s test');

        $food = $_SESSION['player']->getStock_food() - $foodNeeded;
        $wood = $_SESSION['player']->getStock_wood() - $woodNeeded;
        $metal = $_SESSION['player']->getStock_metal() - $metalNeeded;
        $stone = $_SESSION['player']->getStock_stone() - $stoneNeeded;
        $gold = $_SESSION['player']->getStock_gold() - $goldNeeded;
        // $food = (int)$_GET['food'];

        // $pseudo = $_SESSION['pseudo'];


        $rqt = "UPDATE stock set stock_food = :food, stock_wood = :wood, stock_metal = :metal, stock_stone = :stone, stock_gold = :gold where id_player = :id";
        //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
        //On pr??pare notre requ??te. ??a nous renvoie un objet qui est notre requ??te pr??par??e pr??te ?? ??tre execut??e
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':food', $food);
            $statement->bindParam(':wood', $wood);
            $statement->bindParam(':metal', $metal);
            $statement->bindParam(':stone', $stone);
            $statement->bindParam(':gold', $gold);
            //On l'execute
            $result = $statement->execute();
            // echo ('test avant');
            // $_SESSION['town']['town-food'] = $food;
            // $_SESSION['town']['town-wood'] = $wood;
            // $_SESSION['town']['town-metal'] = $metal;
            // $_SESSION['town']['town-stone'] = $stone;
            // $_SESSION['town']['town-gold'] = $gold;
            $_SESSION['player']->setStock_food($food);
            $_SESSION['player']->setStock_wood($wood);
            $_SESSION['player']->setStock_metal($metal);
            $_SESSION['player']->setStock_stone($stone);
            $_SESSION['player']->setStock_gold($gold);
            //session_destroy();
            // include('connexion.php');
            // echo ('test apr??s');

            // $_SESSION['town-food'] = $resource;
            // echo ('food');
            // echo ($_SESSION['town-food']);
            // header('Location: ../index.php');
            // exit();
            // On r??cup??re l'ensemble des r??sultats dans un tableau
            //$results = $statement->fetchAll(PDO::FETCH_ASSOC);
            //$result = $statement->getAttribute();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

        // sleep(10);
        // include_once('construct.php');
        //met en $_session les valeurs pour le niveau suivant
        // include_once('resourcesNeeded.php');
        HandleResources::resourcesNeeded();
    }

    static function substractTraining($foodNeeded, $goldNeeded, $bowNeeded, $id, $player)
    {
        HandleResources::townResourcesRecovering($id, $player);

        if (
            $_SESSION['player']->getTown_food() < $foodNeeded ||
            $_SESSION['player']->getTown_gold() < $goldNeeded ||
            $_SESSION['player']->getTown_bow() < $bowNeeded
        ) {
            $_SESSION['flash'] = 'Entra??nement annul?? car pas assez de ressources en ville';
            ManagerGame::createLog($_SESSION['flash'], $id);
            header('Location: ../frontend/map.php');
            exit();
        }

        $food = $_SESSION['player']->getTown_food() - $foodNeeded;
        $gold = $_SESSION['player']->getTown_gold() - $goldNeeded;
        $bow = $_SESSION['player']->getTown_bow() - $bowNeeded;
        // $food = (int)$_GET['food'];

        // $pseudo = $_SESSION['pseudo'];


        $rqt = "UPDATE town set town_food = :food, town_gold = :gold, town_bow = :bow where id_player = :id";
        //$rqt = "insert into player (pseudo, town_food) values (:pseudo, '100')";
        //On pr??pare notre requ??te. ??a nous renvoie un objet qui est notre requ??te pr??par??e pr??te ?? ??tre execut??e
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':food', $food);
            $statement->bindParam(':gold', $gold);
            $statement->bindParam(':bow', $bow);
            //On l'execute
            $result = $statement->execute();
            $_SESSION['player']->setTown_food($food);
            $_SESSION['player']->setTown_gold($gold);
            $_SESSION['player']->setTown_bow($bow);
            //session_destroy();
            // include('connexion.php');
            // echo ('test apr??s');

            // $_SESSION['town-food'] = $resource;
            // echo ('food');
            // echo ($_SESSION['town-food']);
            // header('Location: ../index.php');
            // exit();
            // On r??cup??re l'ensemble des r??sultats dans un tableau
            //$results = $statement->fetchAll(PDO::FETCH_ASSOC);
            //$result = $statement->getAttribute();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        HandleResources::resourcesNeeded();
    }

    static function townResourcesRecovering($id, $player)
    {
        // echo 'resources';
        try {
            $statement = MySQL::getInstance()->prepare('SELECT * FROM `player` INNER JOIN town ON player.id = town.id_player 
            INNER JOIN level_army ON player.id = level_army.id_player WHERE id = :id');
            $statement->bindParam(':id', $id);
            $statement->execute();

            $result = $statement->fetch();
            $player->hydratation($result);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    static function saveTownResource($resource, $type, $id)
    {
    }

    static function resourcesNeeded()
    {
        $types = ['chateau', 'ferme', 'scierie', 'extracteur', 'carriere', 'mine', 'atelier', 'caserne'];

        foreach ($types as $typeItem) {
            switch ($typeItem) {
                case 'chateau':
                    // $level = $_SESSION['player'];
                    $type = 'castle';
                    break;
                case 'ferme':
                    // $level = $_SESSION['farm-level'];
                    $type = 'farm';
                    break;
                case 'scierie':
                    // $level = $_SESSION['sawmill-level'];
                    $type = 'sawmill';
                    break;
                case 'extracteur':
                    // $level = $_SESSION['extractor-level'];
                    $type = 'extractor';
                    break;
                case 'carriere':
                    // $level = $_SESSION['quarry-level'];
                    $type = 'quarry';
                    break;
                case 'mine':
                    // $level = $_SESSION['mine-level'];
                    $type = 'mine';
                    break;
                case 'caserne':
                    // $level = $_SESSION['barracks-level'];
                    $type = 'barracks';
                    break;
                case 'atelier':
                    // $level = $_SESSION['workshop-level'];
                    $type = 'workshop';
                    break;
            }
            // $typeItem = 'ferme';
            // var_dump($level);
            // $setter = 'setLevel_' . $type;
            $getter = 'getLevel_' . $type;
            $level = $_SESSION['player']->$getter();

            $rqt = "SELECT * from items where type_item = :typeItem and level_item = :levelItem";
            //On pr??pare notre requ??te. ??a nous renvoie un objet qui est notre requ??te pr??par??e pr??te ?? ??tre execut??e
            try {
                $statement = MySQL::getInstance()->prepare($rqt);
                $statement->bindParam(':typeItem', $typeItem);
                $statement->bindParam(':levelItem', $level);
                //On l'execute
                $statement->execute();

                // On r??cup??re l'ensemble des r??sultats dans un tableau
                $results1 = $statement->fetchAll(\PDO::FETCH_ASSOC);
                // var_dump($results1);
                $_SESSION[$type]->setFood($results1[0]['food']);
                $_SESSION[$type]->setWood($results1[0]['wood']);
                $_SESSION[$type]->setMetal($results1[0]['metal']);
                $_SESSION[$type]->setStone($results1[0]['stone']);
                $_SESSION[$type]->setGold($results1[0]['gold']);
                $_SESSION[$type]->setTime_construct($results1[0]['time_construct']);
                // $_SESSION[$type]->setType_item($results1[0]['type_item']);
                // $_SESSION[$type]['food'] = $results1[0]['food'];
                // $_SESSION[$type]['wood'] = $results1[0]['wood'];
                // $_SESSION[$type]['metal'] = $results1[0]['metal'];
                // $_SESSION[$type]['stone'] = $results1[0]['stone'];
                // $_SESSION[$type]['gold'] = $results1[0]['gold'];
                // $_SESSION[$type]['bow'] = $results1[0]['bow'];
                // $_SESSION[$type]['timeConstruct'] = $results1[0]['time_construct'];
                // $_SESSION[$type]['name'] = $results1[0]['type_item'];
                // if ($type = 'quarry') {
                //     $_SESSION[$type]->setType_item('carri??re');
                //     // $_SESSION[$type]['name'] = "carri??re";
                // }
                // if ($type = 'castle') {
                //     $_SESSION[$type]->setType_item("ch??teau");
                //     // $_SESSION[$type]['name'] = "ch??teau";
                // }
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        $typesArmy = ['archer'];

        foreach ($typesArmy as $typeArmy) {
            switch ($typeArmy) {
                case 'archer':
                    // $level = $_SESSION['archer-level'];
                    $typeSoldier = 'archer';
                    break;
            }
            // $typeItem = 'ferme';
            // var_dump($level);
            $getter = 'getLevel_' . $typeArmy;
            $levelArmy = $_SESSION['player']->$getter();

            $rqt = "SELECT * from army where type_army = :typeArmy and level_soldier = :levelArmy";
            //On pr??pare notre requ??te. ??a nous renvoie un objet qui est notre requ??te pr??par??e pr??te ?? ??tre execut??e
            try {
                $statement = MySQL::getInstance()->prepare($rqt);
                $statement->bindParam(':typeArmy', $typeArmy);
                $statement->bindParam(':levelArmy', $levelArmy);
                //On l'execute
                $statement->execute();

                // On r??cup??re l'ensemble des r??sultats dans un tableau
                $results1 = $statement->fetchAll(\PDO::FETCH_ASSOC);
                // var_dump($results1);
                $_SESSION[$typeSoldier]->setStock($results1[0]['stock']);
                $_SESSION[$typeSoldier]->setStrength($results1[0]['strength']);
                $_SESSION[$typeSoldier]->setLife_points($results1[0]['life_points']);
                $_SESSION[$typeSoldier]->setFood($results1[0]['food']);
                $_SESSION[$typeSoldier]->setGold($results1[0]['gold']);
                $_SESSION[$typeSoldier]->setBow($results1[0]['bow']);
                $_SESSION[$typeSoldier]->setTime_training($results1[0]['time_training']);
                // $_SESSION[$typeSoldier]['stock'] = $results1[0]['stock'];
                // $_SESSION[$typeSoldier]['strength'] = $results1[0]['strength'];
                // $_SESSION[$typeSoldier]['life_points'] = $results1[0]['life_points'];
                // $_SESSION[$typeSoldier]['food'] = $results1[0]['food'];
                // $_SESSION[$typeSoldier]['gold'] = $results1[0]['gold'];
                // $_SESSION[$typeSoldier]['bow'] = $results1[0]['bow'];
                // $_SESSION[$typeSoldier]['timeConstruct'] = $results1[0]['time_training'];
                // $_SESSION[$typeSoldier]['name'] = $results1[0]['type_army'];
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }
    }
}
