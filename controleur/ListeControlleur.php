<?php

require __DIR__ . "/../gateway/ListeGateway.php";
require __DIR__ . "/Connexion.php";
require __DIR__ . "/../config/Validation.php";

class ListeControlleur {
    private ListeGateway $listeGateway;

    public function listePublique($id){
        
        $this->listeGateway = new ListeGateway();

        $liste = $this->listeGateway->ListePubliqueById($id);

        require __DIR__ . "/../vues/Liste.php";
    }

    public function listePrivee($id){
        
        $this->listeGateway = new ListeGateway();

        $liste = $this->listeGateway->ListePriveeById($id);

        require __DIR__ . "/../vues/Liste.php";
    }

    public function creation(){
        require __DIR__ . "/../vues/AjoutListe.php";
    } 
}

?>