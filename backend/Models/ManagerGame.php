<?php

namespace Models;

use Models\Map\Item;

class ManagerGame
{
    static function createLog($messageLog, $id)
    {
        // $log = new Log();
        // $log->setId_player($id);
        // $log->setMessage($messageLog);
        $dateLog = date("Y-m-d H:i:s");
        $rqt = "INSERT INTO logs (id_player, message, log_date) VALUES (:id, :messageLog, :dateLog)";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':messageLog', $messageLog);
            $statement->bindParam(':dateLog', $dateLog);
            //On l'execute
            $result = $statement->execute();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
    // plus utilisé
    static function savePartiesPcclh($remainingParties, $id)
    {
        $rqt = "UPDATE pcclh set pcclh_parties = :amount where id_player = :id";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':amount', $remainingParties);
            //On l'execute
            $result = $statement->execute();
            // echo $result;
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
    // plus utlisé
    static function addPartiesDay($id)
    {
        $rqt = 'SELECT DATE_FORMAT(pcclh_date, "%Y-%m-%d") AS `date_pcclh` from pcclh where id_player = :id';
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            // $statement->bindParam(':amount', $remainingParties);
            //On l'execute
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }


        // cf resetMapResources.php pour le calcul de différence entre 2 dates

        $datesql = $result[0]['date_pcclh'];
        $date = date("Y-m-d H:i:s");
        // $date2 = strtotime($date);

        $date2 = new \DateTime($date);
        $date1 = new \DateTime($datesql);
        $date2->format('Y-m-d');
        // echo $date1->diff($date2)->format("%d");
        // die();
        if ($date1->diff($date2)->format("%d") > 0) {
            // if ($date2 - $datesql > 86400) {
            $remainingParties = 5;
            $_SESSION['player']->setPcclh_parties($remainingParties);
            $rqt = "UPDATE pcclh set pcclh_date = :actualDate where id_player = :id";
            try {
                $statement = MySQL::getInstance()->prepare($rqt);
                $statement->bindParam(':id', $id);
                $statement->bindParam(':actualDate', $date);
                //On l'execute
                $result = $statement->execute();
                // echo $result;
                ManagerGame::savePartiesPcclh($remainingParties, $id);
                // $rqt = "UPDATE pcclh set pcclh_parties = :amount where id_player = :id";
                // try {
                //     $statement = MySQL::getInstance()->prepare($rqt);
                //     $statement->bindParam(':id', $id);
                //     $statement->bindParam(':amount', $remainingParties);
                //     //On l'execute
                //     $result = $statement->execute();
                //     // echo $result;
                // } catch (\Exception $exception) {
                //     echo $exception->getMessage();
                // }
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
            // echo 'ajout';
        }
    }
    static function createMap(int $x, int $y, int $id)
    {
        $rqt = "SELECT * FROM map_player WHERE position_x = :x AND position_y = :y AND id_player = :id";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':x', $x);
            $statement->bindParam(':y', $y);
            $statement->bindParam(':id', $id);
            //On l'execute
            $statement->execute();
            // echo $result;
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $result) {
                $items[] = new Item($result);
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        return $items;
    }
}
