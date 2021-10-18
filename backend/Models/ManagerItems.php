<?php

namespace Models;

use Models\Constructs\Farm;
use Models\Constructs\Mine;
use Models\Constructs\Castle;
use Models\Constructs\Quarry;
use Models\Constructs\Sawmill;
use Models\Constructs\Barracks;
use Models\Constructs\Workshop;
use Models\Constructs\Extractor;

class ManagerItems
{
    static function itemLoading($level, $typeItem)
    {
        $statement = MySQL::getInstance()->prepare('SELECT * FROM `items` WHERE level_item = :levelItem AND type_item = :typeItem');
        $statement->bindParam(':levelItem', $level);
        $statement->bindParam(':typeItem', $typeItem);
        $statement->execute();

        $result = $statement->fetch();
        // $farm = new Farm($result);
        switch ($typeItem) {
            case 'chateau':
                $item = new Castle($result);
                break;
            case 'ferme':
                $item = new Farm($result);
                break;
            case 'scierie':
                $item = new Sawmill($result);
                break;
            case 'extracteur':
                $item = new Extractor($result);
                break;
            case 'carriere':
                $item = new Quarry($result);
                break;
            case 'mine':
                $item = new Mine($result);
                break;
            case 'caserne':
                $item = new Barracks($result);
                break;
            case 'atelier':
                $item = new Workshop($result);
                break;
        }
        return $item;
    }
}
