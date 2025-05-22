<?php
require_once("config/model.php");

class Voiture extends Model {

    public function add_voiture($plaque, $date, $marque, $modele, $couleur, $energie, $user_id) {
        $request = $this->pdo->prepare("
            insert into vehicules(plaque_immatriculation, date_premiere_immatriculation, marque, modele, couleur, energie, id_utilisateur)
            values (?, ?, ?, ?, ?, ?, ?)
        ");
        $request->execute([$plaque, $date, $marque, $modele, $couleur, $energie, $user_id]);
    }

    public function voiture_exist($plaque) {
        $request = $this->pdo->prepare("
            select * from vehicules
            where plaque_immatriculation = ? 
        ");
        $request->execute([$plaque]);

        return $request->fetchColumn() > 0;
    }
}
?>