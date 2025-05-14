<?php

class Database {

    protected static $bdd;

    public static function initConnexion(){

        $serverName = "127.0.0.1";
        $username = "ecoride_bd";
        $password = "Eyh8TaRD@";
        
        try {
            $bdd = new PDO("mysql:host=$serverName;dbname=ecoride", $username, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connextion réussi";
        } catch (PDOException $e) {
            echo "Erreur de connexion : ". $e->getMessage();
        }
    }

}
    

   
   
    
    


    




?>