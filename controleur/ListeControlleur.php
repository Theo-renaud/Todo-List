<?php

require __DIR__ . "/../gateway/ListeGateway.php";
require __DIR__ . "/Connexion.php";
require __DIR__ . "/../config/Validation.php";

class ListeControlleur {
    private ListeGateway $listeGateway;
    private TacheGateway $tacheGateway;
    private Validation $validation;


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

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $this->listeGateway = new ListeGateway();
            $this->validation = new Validation();

            if(isset($_POST['isPrivate'])){
                $isPrivate = 1;
            }
            else{
                $isPrivate = 0;
            }

            if(isset($_SESSION['idUtilisateur']) && $isPrivate == 1){
                $idUtilisateur = $_SESSION['idUtilisateur'];
            }
            else{
                $idUtilisateur = 1;
            }

            $this->validation->validationListe($_POST['nom']);

            $this->listeGateway->creeListe($_POST['nom'], $isPrivate, $idUtilisateur);

            header("Location: /");
        }
        else{
            require __DIR__ . '/../vues/AjoutListe.php';
        }
    } 

    public function deleteListe($id){
        $this->listeGateway = new ListeGateway();

        $this->listeGateway->deleteListe($id);

        header("Location: /");
    } 

    public function ajouterTache($idListe){
        $this->tacheGateway = new TacheGateway();

        $this->tacheGateway->addTache($_POST['tache'],'WIP', $idListe,0);

        header("Location: /");
    }
}

?>