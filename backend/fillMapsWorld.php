<?php

use Models\MySQL;

include_once('Models/MySQL.php');

$level = 1;
$x = 0;
$y = 0;

for ($i = 1; $i <= 81; $i++) {
    $type = rand(0, 90);
    if ($type <= 50) {
        $typeItem = "prairie";
    } else if ($type > 50 && $type <= 55) {
        $typeItem = "bois";
    } else if ($type > 55 && $type <= 60) {
        $typeItem = "nourriture";
    } else if ($type > 60 && $type <= 65) {
        $typeItem = "herbes";
    } else if ($type > 65 && $type <= 70) {
        $typeItem = "pierre";
    } else if ($type > 70 && $type <= 75) {
        $typeItem = "metal";
    } else if ($type > 75 && $type <= 80) {
        $typeItem = "arbre";
    } else if ($type > 80 && $type <= 85) {
        $typeItem = "minerai";
    } else if ($type > 85 && $type <= 90) {
        $typeItem = "monstre";
    }
    $typeItems[] = $typeItem;
    $dataResources = [
        "bois" => [1 => [5000, 10000, 20000], 2 => [10000, 20000, 50000]],
        "nourriture" => [1 => [10000, 20000, 50000], 2 => [20000, 50000, 100000]],
        "metal" => [1 => [2000, 5000, 10000], 2 => [5000, 10000, 20000]],
        "pierre" => [1 => [1000, 2000, 5000], 2 => [2000, 5000, 10000]]
    ];
    $dataMonsters = [
        1 => ["strength" => 10, "defense" => 10],
        2 => ["strength" => 20, "defense" => 20]
    ];
    if ($typeItem == "bois" || $typeItem == "nourriture" || $typeItem == "metal" || $typeItem == "pierre") {
        $index = count($dataResources[$typeItem][$level]) - 1;
        $quantity = $dataResources[$typeItem][$level][rand(0, $index)];
        $strength = 0;
        $defense = 0;
    } else if ($typeItem == "herbes" || $typeItem == "arbre" || $typeItem == "minerai") {
        $quantity = 9;
        $strength = 0;
        $defense = 0;
    } else if ($typeItem == "monstre") {
        $quantity = 1;
        $strength = $dataMonsters[$level]["strength"];
        $defense = $dataMonsters[$level]["defense"];
        // echo $strength . ' ' . $defense . PHP_EOL;
    } else if ($typeItem == "prairie") {
        $quantity = 0;
        $strength = 0;
        $defense = 0;
    }
    $req = "INSERT INTO map_item (type_item, level_item, position_x, position_y, map_position, item_strength, item_defense, item_quantity) 
    VALUES (:typeItem, :levelItem, :x, :y, :position, :strength, :defense, :quantity)";
    try {

        $cnx = MySQL::getInstance();
        // var_dump($statement);
        $statement = $cnx->prepare($req);

        $statement->bindParam(':typeItem', $typeItem);
        $statement->bindParam(':levelItem', $level);
        $statement->bindParam(':x', $x);
        $statement->bindParam(':y', $y);
        $statement->bindParam(':position', $i);
        $statement->bindParam(':strength', $strength);
        $statement->bindParam(':defense', $defense);
        $statement->bindParam(':quantity', $quantity);

        $statement->execute();
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

// print_r($data["bois"][$level]);
// echo $quantity . ' ' . $typeItem;
