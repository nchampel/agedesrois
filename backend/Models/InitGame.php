<?php

namespace Models;

use Models\Map\Item;

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

class InitGame
{
    static function initialization($results)
    {
        $player = ManagerPlayer::playerLoading($results[0]['id']);
        $_SESSION['player'] = $player;
        $farm = ManagerItems::itemLoading($_SESSION['player']->getLevel_farm(), 'ferme');
        $_SESSION['farm'] = $farm;
        $castle = ManagerItems::itemLoading($_SESSION['player']->getLevel_castle(), 'chateau');
        $_SESSION['castle'] = $castle;
        $sawmill = ManagerItems::itemLoading(
            $_SESSION['player']->getLevel_sawmill(),
            'scierie'
        );
        $_SESSION['sawmill'] = $sawmill;
        $extractor = ManagerItems::itemLoading(
            $_SESSION['player']->getLevel_extractor(),
            'extracteur'
        );
        $_SESSION['extractor'] = $extractor;
        $quarry = ManagerItems::itemLoading(
            $_SESSION['player']->getLevel_quarry(),
            'carriere'
        );
        $_SESSION['quarry'] = $quarry;
        $mine = ManagerItems::itemLoading(
            $_SESSION['player']->getLevel_mine(),
            'mine'
        );
        $_SESSION['mine'] = $mine;
        $barracks = ManagerItems::itemLoading(
            $_SESSION['player']->getLevel_barracks(),
            'caserne'
        );
        $_SESSION['barracks'] = $barracks;
        $workshop = ManagerItems::itemLoading(
            $_SESSION['player']->getLevel_workshop(),
            'atelier'
        );
        $_SESSION['workshop'] = $workshop;

        $archer = ManagerArmy::armyLoading(
            $_SESSION['player']->getLevel_archer(),
            'archer'
        );
        $_SESSION['archer'] = $archer;

        // print_r($_SESSION['player']);
    }
    static function mapInitialization($id)
    {
        $req = "SELECT * from map_item";
        try {

            $cnx = MySQL::getInstance();

            $statement = $cnx->prepare($req);

            $statement->execute();

            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $req = "SELECT generation_date from map_player WHERE id_player = :id";
            try {

                $cnx = MySQL::getInstance();
                // var_dump($statement);
                $statement = $cnx->prepare($req);

                $statement->bindParam(':id', $id);

                $statement->execute();
                $mapPlayerResults = $statement->fetchAll(\PDO::FETCH_ASSOC);
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
            // print_r($mapPlayerResults);
            // if (empty($mapPlayerResults)) {
            //     echo 'print';
            //     die();
            // }
            // die();

            // $dateUsingResource = $result['using_date'];
            // $date = date("Y-m-d H:i:s");
            // $timeDateActual = strtotime($date);
            // $timeDate = strtotime($dateUsingResource);
            // $timeDiff = $timeDateActual - $timeDate;

            $dateMapGeneral = strtotime($results[0]['generation_date']);
            // $date1 = new \DateTime($dateMapGeneral);
            if (!empty($mapPlayerResults)) {

                // $dateMapPlayer = strtotime($mapPlayerResults[0]['generation_date']);
                // $date2 = new \DateTime($dateMapPlayer);
                $date2 = strtotime($mapPlayerResults[0]['generation_date']);
            } else {
                $date = date("Y-m-d H:i:s");
                // $date2 = new \DateTime($date);
                $date2 = strtotime($date);
            }

            // $date2->format('Y-m-d');
            // echo $date1->diff($date2)->format("%d");
            // die();
            // print_r($date1->diff($date2)->format("%d"));
            // die();
            // if (empty($mapPlayerResults) || $date1->diff($date2)->format("%d") > 0) {
            if (empty($mapPlayerResults) || $date2 - $dateMapGeneral > 86400) {
                // echo 'réussi';
                // die();
                foreach ($results as $result) {
                    $item = new Item($result);
                    $item->setId_player($id);

                    $idPlayer = $item->getId_player();
                    $type = $item->getType_item();
                    $level = $item->getLevel_item();
                    $x = $item->getPosition_x();
                    $y = $item->getPosition_y();
                    $position = $item->getMap_position();
                    $strength = $item->getItem_strength();
                    $defense = $item->getItem_defense();
                    $quantity = $item->getItem_quantity();
                    // print_r($item);
                    $req = "INSERT INTO map_player (id_player, type_item, level_item, position_x, position_y, map_position, item_strength, item_defense, item_quantity) 
                VALUES (:id, :typeItem, :levelItem, :x, :y, :position, :strength, :defense, :quantity)";
                    try {

                        $cnx = MySQL::getInstance();
                        // var_dump($statement);
                        $statement = $cnx->prepare($req);

                        $statement->bindParam(':id', $idPlayer);
                        $statement->bindParam(':typeItem', $type);
                        $statement->bindParam(':levelItem', $level);
                        $statement->bindParam(':x', $x);
                        $statement->bindParam(':y', $y);
                        $statement->bindParam(':position', $position);
                        $statement->bindParam(':strength', $strength);
                        $statement->bindParam(':defense', $defense);
                        $statement->bindParam(':quantity', $quantity);

                        $statement->execute();
                    } catch (\Exception $exception) {
                        echo $exception->getMessage();
                    }
                }
            }
            // print_r($result);


            // die();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
