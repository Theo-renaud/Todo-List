<?php

require __DIR__ . "/../modeles/Utilisateur.php";
class UserGateway
{
    private Connection $co;

    public function __construct()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=todolist;port=3306;charset=utf8';
        $user = 'root';
        $pass = 'root';

        $this->co = new Connection($dsn,$user,$pass);
    }

    public function getByNom(string $nom)//: ?Utilisateur
    {
        $req = "SELECT * FROM Utilisateur WHERE nom = :nom";
        $this->co->executeQuery($req,array(':nom' => array($nom,PDO::PARAM_STR)));
        $user = $this->co->getResults();
        foreach($user as $row){
            $utilisateur[] = new Utilisateur($row['id'],$row['nom'],$row['mdp'],$row['isAdmin']);
            foreach($utilisateur as $u){
                return $u === false ? null : $u;
            }
        }
    }

    // public function insert(Utilisateur $user): bool
    // {
    //     $req = $this->pdo->prepare("INSERT INTO utilisateur (nom, mdp, idAdmin) Values(:nom, :mdp, :isAdmin)");
    //     try {
    //         $req->execute(['nom' => $user->getNom(), 'mdp' => $user->getMdp(), 'idAdmin' => $user->getPerm()]);
    //     } catch (\PDOException $ex) {
    //         if ($this->config->isUniqueConstraintViolation($ex)) {
    //             return false;
    //         }
    //         throw $ex;
    //     }
    //     return true;
    // }
}

?>