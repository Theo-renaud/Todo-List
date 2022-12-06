<?php

declare(strict_types=1);

class UserControlleur
{
    public function connexion()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }
        else{
            require __DIR__ . '/../vues/ConnexionUtilisateur.php';
        }
    }

    public function logout()
    {
        
    }
}