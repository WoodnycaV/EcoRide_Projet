<?php
require_once("models/trajet.php");

class TrajetController {
    public $model_trajet;

    public function __construct(){
        $this->model_trajet = new Trajet();
    }

    public function creation() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $lieu_dep = ucfirst(strtolower($_POST['lieu_dep']));
            $lieu_arr = ucfirst(strtolower($_POST['lieu_arr']));
            $heure_dep = $_POST['heure_dep'];
            $heure_arr = $_POST['heure_arr'];
            $date = $_POST['date'];
            $prix = $_POST['prix'];
            $nb_place = $_POST['nb_place'];
            $voiture = $_POST['voiture'];
            
            if($this->model_trajet->trajetExiste($_SESSION['user_id'], $lieu_dep, $lieu_arr, $heure_dep, $heure_arr, $date)) {
               //gerer l'affichage des erreurs
                echo "Un trajet identique existe déja";
            } else {
                $ecolo = $this->model_trajet->estElectrique($_SESSION['user_id'], $voiture);
                $result = $this->model_trajet->creation($lieu_dep, $lieu_arr, $heure_dep, $heure_arr, $date, $prix, $nb_place, $voiture, $ecolo);
                echo $result;
            }
            
        } else {
            $vehicules = $this->model_trajet->getVehicules();
            include("views/trajet/form.php");
        }
        
    }

    

}

?>