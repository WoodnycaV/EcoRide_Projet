<?php
require_once("models/preference.php");

class PreferenceController {

    public $model_preference;

    public function __construct() {
        $this->model_preference = new Preference();
    }

    public function ajouter() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];

            if($this->model_preference->exist_pref($nom)) {
                $error = "La preference existe deja";
                $pref_id = $this->model_preference->get_preference($nom);
                
                if($this->model_preference->exist_pref_user($pref_id["id_preference"], $_SESSION['user_id'])) {
                    $error = "Vous avez déja cette préference";
                } else {
                    $this->model_preference->ajouter_a_user($_SESSION['user_id'], $pref_id);
                }
            } else {
                $this->model_preference->ajouter($nom);
                $pref_id = $this->model_preference->get_preference($nom);
                $this->model_preference->ajouter_a_user($_SESSION['user_id'], $pref_id["id_preference"]);
            }

        }else {
            include ("views/preference/form.php");
        }
    }

}
?>