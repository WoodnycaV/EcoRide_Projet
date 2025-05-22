<?php

require_once("models/user.php");

class UserController {
    public $error = null;
    public $model_user;

    public function __construct() {
       $this->model_user = new User();
    }

    public function login() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $identifiant = $_POST['id'];
            $pwd = $_POST['password'];

            $user = $this->model_user->connexion($identifiant, $pwd);
            
            if($user) {
                
                $_SESSION['user_id'] = $user['id_utilisateur'];
                $_SESSION['pseudo'] = $user['pseudo_utilisateur'];
                $_SESSION['role'] = $user['role'];
                
                header('Location: index.php?controller=user&action=profil');
                exit;
            } else {
                
                $error = "Aucun compte utilisateur n'a été trouver a cet identifiant";
                //include ("views/user/login.php"); Voir comment l'erreur est gerer avec la page connexion si il n'y pas user

            }
           
        } else {

            $page_title = "Connexion";
           // $page_css = "login";
            include ("views/user/login.php");

        }
        
        
    }

    public function register() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            $pwd_confirm = $_POST['password_confirm'];
            

            if($this->model_user->userExist($pseudo, $email)) {
                $error = "Un compte existe déja avec cette email ou ce pseudo";
            }
            elseif($pwd !== $pwd_confirm) {
                $error = "Les mots de passes ne correspondent pas";
            } 
            else {
                
                $this->model_user->incription($pseudo, $email, $pwd);
                header('location: index.php?controller=user&action=login');
                exit;
            }

        } else {
            $page_title = "Inscription";
           // $page_css = "register";
            include ("views/user/register.php");

        }
        
    }

    public function logout() {
        unset($_SESSION['user_id']);
        include ("views/acceuil/index.php");
    }

    public function profil() {
        
        if(isset($_SESSION['user_id'])) {

            //gerer l'affichage en fonction du role admin/passager/conducteur/employee
            $user_id = $_SESSION['user_id'];

            $user = $this->model_user->getUserInfo($user_id);
            //definit si l'user des voitures
            $vehicules = $this->model_user->getVehiculesUser($user_id);
            if(count($vehicules) > 0 && $vehicules != null) {
                $_SESSION['voiture_exist'] = true;
            } else {
                $_SESSION['voiture_exist'] = false;
            }
            

            $note_user = $this->model_user->getNoteUser($user_id);
            $preferences_user = $this->model_user->getPreference($user_id);
            $reservation_user = $this->model_user->getReservation($user_id);
            $trajet_user = $this->model_user->getTrajet($user_id);

            $page_title = "Profil";
            $page_css = "profil";
            include ("views/user/profil.php");
            
        } else {
            include ("views/user/login.php");
        }
        
    }
}