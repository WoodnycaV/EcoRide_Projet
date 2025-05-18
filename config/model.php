<?php

//Permet de faire l'heritage de database et de fourmir $this->pdo

require_once("config/database.php");
class Model {

    protected $pdo;

    public function __construct() {
        $this->pdo = Database::initConnexion();
    }

}

?>