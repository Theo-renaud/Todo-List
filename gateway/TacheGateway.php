<?php 

require __DIR__ . "/../modeles/Tache.php";

class TacheGateway
{
    private Connection $co;

    public function __construct()
    {
        $dsn = 'mysql:host=londres;dbname=dbthrenaud1';
        $user = 'threnaud1';
        $pass = 'achanger';

        $this->co = new Connection($dsn,$user,$pass);
    }

    public function getTachesByIdListe(int $idListe): ?array
    {
        $req = "SELECT * FROM Tache WHERE idListe = :idListe";
        $this->co->executeQuery($req,array(':idListe' => array($idListe,PDO::PARAM_STR)));
        $taches = $this->co->getResults();
        foreach($taches as $row){
            $listeDeTaches[] = new Tache($row['id'],$row['nom'],$row['description'],$row['idliste']);
        }
        if(empty($listeDeTaches)){
            return null;
        }
        else {
            return $listeDeTaches;
        }
    }
}