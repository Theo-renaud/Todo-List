<?php

declare(strict_types=1);

require __DIR__ . "/../gateway/UserGateway.php";
require __DIR__ . "/Connexion.php";

class UserControlleur
{   
    private UserGateway $userGateway;
    private Validation $validation;
    
    public function connexion()
    {
        session_start();
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
                echo'<a href="/accueil/accueil">';
            } 
        }
        else{
            require __DIR__ . '/../vues/ConnexionUtilisateur.php';
        }
    }

    public function logout()
    {
        
    }
}
