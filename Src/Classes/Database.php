<?php

namespace Classes;

define('DB_HOST'        , "DESKTOPMATEUS");
define('DB_USER'        , "TestePhp");
define('DB_PASSWORD'    , "1234");
define('DB_NAME'        , "TestePhp");
define('DB_DRIVER'      , "sqlsrv");

use PDO;
use PDOException;
use Exception;

class Database
{

    private static $connection;

    public static function getConnection() {

        $pdoConfig  = DB_DRIVER . ":". "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=".DB_NAME.";";

        try {
            if(!isset($connection)){
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
        }
    }

}