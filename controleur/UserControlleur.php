<?php

declare(strict_types=1);
require __DIR__ . '/../config/config.php';
class UserControlleur
{
    private UserGateway $userGateway;

    public function connexion()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }
        else{
            require __DIR__ . '/../vues/ConnexionUtilisateur.php';
            
            $db = new PDO($dsn,$user,$pass);
            $userGateway = new UserGateway($db);
            $this->userGateway->getByLogin();


        }
    }

    public function logout()
    {
        
    }
}
