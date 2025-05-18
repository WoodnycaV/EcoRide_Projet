<?php

require_once("models/user.php");

class UserController {
    public $error = null;

    public function __construct() {
       
    }

    public function login() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $identifiant = $_POST['id'];
            $pwd = $_POST['password'];

            $model_user = new User();
            $user = $model_user->connexion($identifiant, $pwd);

            if($user) {
                session_start();
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['pseudo'] = $user['pseudo_utilisateur'];
                $_SESSION['role'] = $user['role'];
                
                header('Location: index.php?controller=user&action=profil');
                exit;
            } else {
                
                $error = "Aucun compte utilisateur n'a été trouver a cet identifiant";
                //include ("views/user/login.php"); Voir comment l'erreur est gerer avec la page connexion si il n'y pas user

            }
           
        } else {

            include ("views/user/login.php");

        }
        
        
    }

    public function register() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            $pwd_confirm = $_POST['password_confirm'];

            $model_user = new User();
            

            if($model_user->userExist($pseudo, $email)) {
                $error = "Un compte existe déja avec cette email ou ce pseudo";
            }
            elseif($pwd !== $pwd_confirm) {
                $error = "Les mots de passes ne correspondent pas";
            } 
            else {
                
                $model_user->incription($pseudo, $email, $pwd);
                header('location: index.php?controller=user&action=login');
                exit;
            }

        } else {
            include ("views/user/register.php");
        }
        
    }

    public function profil() {
        include("views/user/profil.php");
    }
}