<?php

namespace Models;

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
}
