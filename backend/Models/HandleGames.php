<?php

namespace Models;

class HandleGames
{
    static function pcclh($playerChoice, $computerChoice)
    {
        // $choices = ['rock', 'paper', 'scissors', 'lizard', 'man'];
        // $computerChoice = $choices[rand(0, 4)];
        switch ($playerChoice) {
            case 'rock':
                if ($computerChoice == 'rock') {
                    $win = 'égalité';
                }
                if ($computerChoice == 'paper' || $computerChoice == 'man') {
                    $win = 'perdu';
                }
                if ($computerChoice == 'scissors' || $computerChoice == 'lizard') {
                    $win = 'gagné';
                }
                break;
            case 'paper':
                if ($computerChoice == 'paper') {
                    $win = 'égalité';
                }
                if ($computerChoice == 'scissors' || $computerChoice == 'lizard') {
                    $win = 'perdu';
                }
                if ($computerChoice == 'rock' || $computerChoice == 'man') {
                    $win = 'gagné';
                }
                break;
            case 'scissors':
                if ($computerChoice == 'scissors') {
                    $win = 'égalité';
                }
                if ($computerChoice == 'rock' || $computerChoice == 'man') {
                    $win = 'perdu';
                }
                if ($computerChoice == 'paper' || $computerChoice == 'lizard') {
                    $win = 'gagné';
                }
                break;
            case 'lizard':
                if ($computerChoice == 'lizard') {
                    $win = 'égalité';
                }
                if ($computerChoice == 'rock' || $computerChoice == 'scissors') {
                    $win = 'perdu';
                }
                if ($computerChoice == 'man' || $computerChoice == 'paper') {
                    $win = 'gagné';
                }
                break;
            case 'man':
                if ($computerChoice == 'man') {
                    $win = 'égalité';
                }
                if ($computerChoice == 'paper' || $computerChoice == 'lizard') {
                    $win = 'perdu';
                }
                if ($computerChoice == 'rock' || $computerChoice == 'scissors') {
                    $win = 'gagné';
                }
                break;
        }
        return $win;
    }

    static function numberPartiesRecovering($id, $player)
    {
        try {
            $statement = MySQL::getInstance()->prepare('SELECT pcclh_parties FROM `pcclh` WHERE id_player = :id');
            $statement->bindParam(':id', $id);
            $statement->execute();

            $result = $statement->fetch();
            $player->hydratation($result);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
