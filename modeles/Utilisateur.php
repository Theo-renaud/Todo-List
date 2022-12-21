<?php

class Utilisateur{

    private int $id;
    private string $nom;
    private string $mdp;
    private bool $isAdmin;

    function __construct(int $id, string $nom, string $mdp, bool $isAdmin)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->mdp = $mdp;
        $this->isAdmin = $isAdmin;
    }

    public function getNom() :string
    {
        return $this->nom;
    }

    public function getmdp() :string
    {
        return $this->mdp;
    }

    public function getPerm() :string
    {
        return $this->isAdmin;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isAdmin() :bool
    {
        if( $this->isAdmin == 1){
            return true;
        }

        else { 
            return false;
        }
    }

    // public function setMdp(string $mdp){

    //     $this->mdp = password_hash($mdp,PASSWORD_DEFAULT);
    // } 
}

?>
