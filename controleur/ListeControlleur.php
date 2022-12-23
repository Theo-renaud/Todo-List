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

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $this->listeGateway = new ListeGateway();

            // $this->validation = new Validation();
            // $this->validation->validationListe($_POST['nom']);

            if(isset($_POST['isPrivate'])){
                $isPrivate = 1;
            }
            else{
                $isPrivate = 0;
            }

            if(isset($_SESSION['idUtilisateur'])){
                $idUtilisateur = $_SESSION['idUtilisateur'];
            }
            else{
                $idUtilisateur = 1;
            }

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

    public function ajouterTache($id){
        //$this->listeGateway = new ListeGateway();

        //$this->listeGateway->ajouterTache($id);

        //header("Location: /");
    }
}

?>