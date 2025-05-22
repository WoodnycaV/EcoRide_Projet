<?php
class Router {
    public function route() {
        // trouver un solution pour gerer l'affichage de title du doc html

        //Reccupere le controleur et l'action depuis l'URL
        $controller = $_GET['controller'] ?? 'acceuil';
        $action = $_GET['action'] ?? 'index';

        //Creer le nom de la class controleur
        $classController = ucfirst($controller). 'Controller';

        // Verifie si le controleur et l'action existe
        $controllerFile = "controllers/". $controller. "Controller.php";
        if(file_exists($controllerFile)) {

            require_once $controllerFile;
            $controllerInstance = new $classController();

        } else {
            $this->show404();
        }
            
        if(method_exists($controllerInstance, $action)) {
           $controllerInstance->$action();
        } else {
            $this->show404();
        }
        
    }

    private function show404() {
        http_response_code(404);
        require_once("views/error/404.php");
    }
}

?>