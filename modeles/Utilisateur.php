<?php

class Utilisateur{
    private string $nom;
    
    function get_nom() : string{
        return $this->nom;
    }

    function set_nom(string $nom){
        $this->nom= $nom;
    }
}
?> 