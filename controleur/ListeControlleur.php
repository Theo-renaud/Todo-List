<?php

require __DIR__ . "/../gateway/ListeGateway.php";
require __DIR__ . "/Connexion.php";
require __DIR__ . "/../config/Validation.php";

class ListeControlleur {
    private ListeGateway $listeGateway;

    public function liste(){
        
        $this->listeGateway = new ListeGateway();

        $dVueListe = $this->listeGateway->ListePublic();

        require __DIR__ . "/../vues/Liste.php";
    }

}

?>