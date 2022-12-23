<?php

require __DIR__ . "/../gateway/ListeGateway.php";
require __DIR__ . "/Connexion.php";
require __DIR__ . "/../config/Validation.php";

class ListeControlleur {
    private ListeGateway $listeGateway;

    public function liste($id){
        
        $this->listeGateway = new ListeGateway();

        $liste = $this->listeGateway->ListeById($id);

        require __DIR__ . "/../vues/Liste.php";
    }

}

?>