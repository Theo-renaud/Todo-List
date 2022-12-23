<?php

declare(strict_types=1);

require __DIR__ . "/../gateway/UserGateway.php";
require __DIR__ . "/Connexion.php";
require __DIR__ . "/../config/Validation.php";


class UserControlleur
{   
    private UserGateway $userGateway;
    private Validation $validation;
    
    public function connexion()
    {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $this->userGateway = new UserGateway();
            
            $this->validation = new Validation();
            $this->validation->validationConnexion($_POST['nom'],$_POST['mdp']);

            $user = $this->userGateway->getByNom($_POST['nom']);

            if(password_verify($_POST['mdp'],$user->getmdp()) == FALSE){
                echo "MAUVAIS MDP";
            }
            else{
                $_SESSION['idUtilisateur'] = $user->getId();
                $_SESSION['nomUtilisateur'] = $user->getNom();
                header("Location: /");
            } 
        }
        else{
            require __DIR__ . '/../vues/ConnexionUtilisateur.php';
        }
    }

    public function deconnexion()
    {
        session_unset();
        session_destroy();

        header("Location: /");
    }
}
