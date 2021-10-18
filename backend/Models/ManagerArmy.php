<?php

namespace Models;

use Models\Army\Archer;

class ManagerArmy
{
    static function armyLoading($level, $typeArmy)
    {
        $statement = MySQL::getInstance()->prepare('SELECT * FROM `army` WHERE level_soldier = :levelSoldier AND type_army = :typeArmy');
        $statement->bindParam(':levelSoldier', $level);
        $statement->bindParam(':typeArmy', $typeArmy);
        $statement->execute();

        $result = $statement->fetch();
        // $farm = new Farm($result);
        switch ($typeArmy) {
            case 'archer':
                $item = new Archer($result);
                break;
        }
        // print_r($item);
        // die();
        return $item;
    }
}
