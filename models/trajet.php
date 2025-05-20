<?php
require_once("config/model.php");

class Trajet extends Model {

    public function creation($lieu_dep, $lieu_arr, $heure_dep, $heure_arr, $date, $prix, $nb_place, $voiture, $ecolo){
        $request = $this->pdo->prepare("
            insert into trajets(lieu_depart, lieu_arrivee, heure_depart, heure_arrivee, date_depart, ecologique, nb_place, voiture, id_conducteur, prix) 
            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)

        "); 

        return $request->execute([$lieu_dep, $lieu_arr, $heure_dep, $heure_arr, $date, $ecolo, $nb_place, $voiture,  $_SESSION['user_id'],$prix]);

    }

    public function estElectrique($user_id, $plaque_imma) {
        $request = $this->pdo->prepare("
            select energie from vehicules
            where plaque_immatriculation = ? and id_utilisateur = ?
        "); 
        $request->execute([$plaque_imma, $user_id]);
        $energie = $request->fetch();
        
        if($energie['energie'] === "electrique"){
            return 1;
        } else {
            return 0;
        }
        
    }

    public function trajetExiste($user_id, $lieu_dep, $lieu_arr, $heure_dep, $heure_arr, $date_dep) {
        $request = $this->pdo->prepare("
            select count(*) from trajets
            where id_conducteur = ?
            and lieu_depart = ?
            and lieu_arrivee = ?
            and heure_depart = ?
            and heure_arrivee = ?
            and date_depart = ?
        ");
        $request->execute([$user_id, $lieu_dep, $lieu_arr, $heure_dep, $heure_arr, $date_dep]);

        return $request->fetchColumn() > 0;
    }

    public function getVehicules() {
        $request = $this->pdo->prepare("
            select plaque_immatriculation 
            from vehicules
            where id_utilisateur = ?
        ");
        $request->execute([$_SESSION['user_id']]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
   
}