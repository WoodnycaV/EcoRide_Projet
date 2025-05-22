<?php
require_once("models/voiture.php");

class VoitureController {

    public $model_voiture;

    public function __construct() {
        $this->model_voiture = new Voiture();
    }

    public function enregistrer() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];
            $plaque = $_POST['plaque_imma'];
            $date_imma = $_POST['date_imma'];
            $marque = ucfirst(strtolower($_POST['marque']));
            $modele = ucfirst(strtolower($_POST['modele']));
            $couleur = ucfirst(strtolower($_POST['couleur']));
            $energie = ucfirst(strtolower($_POST['energie']));

            if($this->model_voiture->voiture_exist($plaque)) {
                $error = "Ce vehicule existe déja";
            } else {
                $this->model_voiture->add_voiture($plaque, $date_imma, $marque, $modele, $couleur, $energie, $user_id);
                header('location: index.php?controller=user&action=login');
                exit;
            }
            
        } else {
            include ("views/voiture/form.php");
        }

       
    }
}
?>