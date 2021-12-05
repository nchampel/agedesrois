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


class HandleTransactions
{
    static function getTransactions($id)
    {
        $rqt = "SELECT * FROM `transaction` WHERE ISNULL(id_buyer) AND id_seller != :id";
        try {
            $statement = MySQL::getInstance()->prepare($rqt);
            $statement->bindParam(':id', $id);
            //On l'execute
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
            // var_dump($results);
            // die();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        return $results;
    }
}
