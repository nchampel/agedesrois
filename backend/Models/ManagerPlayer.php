<?php

namespace Models;

class ManagerPlayer
{
    static function playerLoading($id)
    {
        try {
            $statement = MySQL::getInstance()->prepare('SELECT */*, town.id_player as id*/ FROM `player` INNER JOIN town ON player.id = town.id_player 
                                                    INNER JOIN stock ON player.id = stock.id_player 
                                                    INNER JOIN level_army ON player.id = level_army.id_player 
                                                    INNER JOIN level_constructs_town ON player.id = level_constructs_town.id_player
                                                    INNER JOIN level_constructs_stock ON player.id = level_constructs_stock.id_player
                                                    INNER JOIN pcclh ON player.id = pcclh.id_player   
                                                    WHERE player.id = :id');
            $statement->bindParam(':id', $id);
            $statement->execute();

            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            // echo $id;
            // print_r($result);
            // die();
            $player = new Player($result);
            return $player;
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
