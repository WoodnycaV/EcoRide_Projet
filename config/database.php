<?php

class Database {

    private static $pdo = null;

    public static function initConnexion(){

        if(self::$pdo === null) {
            $serverName = "127.0.0.1";
            $username = "ecoride_bd";
            $password = "Eyh8TaRD@";
            
            self::$pdo = new PDO("mysql:host=$serverName;dbname=ecoride", $username, $password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;

    }

}
    

   
   
    
    


    




?>