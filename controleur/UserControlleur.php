<?php

declare(strict_types=1);
require __DIR__ . '/../config/config.php';
class UserControlleur
{
    public function connexion()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }
        else{
            require __DIR__ . '/../vues/ConnexionUtilisateur.php';
            
            $dsn = 'mysql:host=londres;dbname=dbthrenaud1';
            $user = 'threnaud1';
            $pass = 'achanger';
            
            $db = new PDO($dsn,$user,$pass);

            $query = "SELECT * FROM Utilisateur"; 
            $prep = $db->prepare($query);
            $prep->execute();

            $result = $prep->fetchall();

            echo "Une liste d'utilisateurs <br> <br>";

            foreach ($result as $utilisateur) {
                echo "Nom : " . $utilisateur['nom'] . "<br/>";
            }
        }
    }

    public function logout()
    {
        
    }
}
