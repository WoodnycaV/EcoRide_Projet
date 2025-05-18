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
}
?>