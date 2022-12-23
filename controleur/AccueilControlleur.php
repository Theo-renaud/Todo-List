<?php

require __DIR__ . "/../gateway/ListeGateway.php";
require __DIR__ . "/Connexion.php";
require __DIR__ . "/../config/Validation.php";

class AccueilControlleur {
    private ListeGateway $listeGateway;

    public function accueil(){
        
        $this->listeGateway = new ListeGateway();

        $dVueListe = $this->listeGateway->ListesPubliques();

        if(isset($_SESSION['idUtilisateur'])){
            $dVueListePrive = $this->listeGateway->ListesPriveesByUser($_SESSION['idUtilisateur']);
        }

        require __DIR__ . "/../vues/index.php";
    }

}

?>