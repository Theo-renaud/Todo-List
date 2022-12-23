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
            $listeDeTaches[] = new Tache($row['id'],$row['nom'],$row['description'],$row['idliste'],$row['ischeck']);
        }
        if(empty($listeDeTaches)){
            return null;
        }
        else {
            return $listeDeTaches;
        }
    }

    public function addTache(int $id, string $nom, string $description,int $idListe,bool $ischeck){
        $req="INSERT INTO Tache VALUES(':id',':nom',':description',':idListe',':ischeck')";
        $this->co->executeQuery($req,array(':id' => array($id,PDO::PARAM_INT),
                                            ':nom' => array($nom,PDO::PARAM_STR),
                                            ':description' => array($description,PDO::PARAM_STR),
                                            ':idListe' => array($idListe,PDO::PARAM_INT),
                                            ':ischeck' => array($ischeck,PDO::PARAM_BOOL)
                                            ));
    } 

    public function deleteTache(int $idTache): void{
        $req="DELETE FROM Tache WHERE id = :idTache";
        $this->co->executeQuery($req,array(':id' => array($idTache,PDO::PARAM_INT)));
    } 

}