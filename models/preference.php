<?php
require_once("config/model.php");

    class Preference extends Model {


        public function ajouter($nom) {
            $request = $this->pdo->prepare("
                insert into preferences(nom)
                values (?)
            ");

            return $request->execute([$nom]);
            
        }

        public function ajouter_a_user($id_user, $id_pref) {
            $request = $this->pdo->prepare("
                insert into preferences_utilisateur(id_preference, id_utilisateur)
                values (?, ?)
            ");
            return $request->execute([$id_pref, $id_user]);
        }

        public function exist_pref($nom) {
            $request = $this->pdo->prepare("
                select * from preferences
                where nom = ?
            ");

            $request->execute([$nom]);
            return $request->fetchColumn() > 0;
        }

        public function exist_pref_user($id_pref, $user_id) {
            $request = $this->pdo->prepare("
                select * from preferences_utilisateur
                where id_preference = ? and id_utilisateur = ?
            ");

            $request->execute([$id_pref, $user_id]);
            return $request->fetchColumn() > 0;
        }

        public function get_preference($nom) {
            $request = $this->pdo->prepare("
                select id_preference from preferences
                where nom = ?
            ");

            $request->execute([$nom]);
            return $request->fetch(PDO::FETCH_ASSOC);
        }
    }

?>