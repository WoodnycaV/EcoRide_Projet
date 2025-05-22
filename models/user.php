<?php
require_once("config/model.php");
class User extends Model {

    public function connexion($identifiant, $pwd) {

        $request = $this->pdo->prepare("
            select * from utilisateurs
            where email_utilisateur = :identifiant or pseudo_utilisateur = :identifiant
        ");

        $request->execute(['identifiant' => $identifiant]);
        $user = $request->fetch();

        if($user && password_verify($pwd, $user['mot_de_passe'])) {
            return $user;
        } 

        else {
            return false;
        }

    }

    public function incription($pseudo, $email, $pwd) {

        $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);
        $request = $this->pdo->prepare("
            insert into utilisateurs(pseudo_utilisateur, email_utilisateur, mot_de_passe, role, credit) 
            values ( ?, ?, ?, 'passager', 20)
        ");
        $request->execute([$pseudo, $email, $pwd_hash]);

    }

    public function userExist($pseudo, $email) {

        $request = $this->pdo->prepare("
            select count(*) from utilisateurs
            where pseudo_utilisateur = ? or email_utilisateur = ?
        ");
        $request->execute([$pseudo, $email]);
        return $request->fetchColumn() > 0;

    }

    public function getNoteUser($id_user) {
        $request = $this->pdo->prepare("
            select round(sum(note)/(select count(*) from avis where id_conducteur = ?), 1)  
            from avis
        ");
        $request->execute([$id_user]);
        return $request->fetch();

    }

    public function getUserInfo($id_user) {
        $request = $this->pdo->prepare("
            select pseudo_utilisateur, email_utilisateur, role, credit, photo  from utilisateurs 
            where id_utilisateur = ?
        ");
        $request->execute([$id_user]);
        return $request->fetch();
    }
    


    public function getVehiculesUser($id_user) {
        $request = $this->pdo->prepare("
            select * from vehicules
            where id_utilisateur = ?
        ");

        $request->execute([$id_user]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPreference($id_user) {
        $request = $this->pdo->prepare("
            select nom from preferences 
            where id_preference = (select id_preference from preferences_utilisateur where id_utilisateur = ?)
        ");
        $request->execute([$id_user]);
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function getReservation($id_user) {
        
        $request = $this->pdo->prepare("
            select * from reservations
            where id_passager = ?
        ");
        $request->execute([$id_user]);

        return $request->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getTrajet($id_user) {
        $request = $this->pdo->prepare("
            select * from trajets 
            where id_conducteur = ?
        ");
        $request->execute([$id_user]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>