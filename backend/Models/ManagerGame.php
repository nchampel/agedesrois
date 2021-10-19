<?php

namespace Models;

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
}
