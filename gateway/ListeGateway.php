<?php

require_once 'gateway/TacheGateway.php';
require __DIR__ . "/../modeles/Liste.php";

class ListeGateway
{
    private Connection $co;
    private TacheGateway $tacheGateway;

    public function __construct()
    {
        $dsn = 'mysql:host=londres;dbname=dbthrenaud1';
        $user = 'threnaud1';
        $pass = 'achanger';

        $this->co = new Connection($dsn,$user,$pass);
        $this->tacheGateway = new TacheGateway();
    }

    public function ListesPubliques() : ?array{
        $req="SELECT * FROM Liste WHERE isprivate=0";
        $this->co->executeQuery($req,array());
        $listes=$this->co->getResults();
        foreach($listes as $row){
            $Tache=$this->tacheGateway->getTachesByIdListe($row['id']);
            $Listes[]=new Liste($row['id'],$row['nom'],$row['userid'],$row['isprivate'],$Tache);
        }
        return $Listes;
    }

    public function ListePubliqueById(int $id) : ?Liste{
        $req="SELECT * FROM Liste WHERE id = :id AND isprivate=0";
        $this->co->executeQuery($req,array(':id' => array($id,PDO::PARAM_INT)));
        $listes=$this->co->getResults();
        foreach($listes as $row){
            $Tache=$this->tacheGateway->getTachesByIdListe($row['id']);
            $liste=new Liste($row['id'],$row['nom'],$row['userid'],$row['isprivate'],$Tache);
        }

        if(empty($liste)){
            return null;
        }
        else {
            return $liste;
        }
    }

    public function ListesPriveesByUser(int $idUser) : ?array{
        $req="SELECT * FROM Liste WHERE userid = :idUser";
        $this->co->executeQuery($req,array(':idUser' => array($idUser,PDO::PARAM_INT)));
        $listes=$this->co->getResults();
        foreach($listes as $row){
            $Tache=$this->tacheGateway->getTachesByIdListe($row['id']);
            $Listes[]=new Liste($row['id'],$row['nom'],$row['userid'],$row['isprivate'],$Tache);
        }
        
        if(empty($Listes)){
            return null;
        }
        else {
            return $Listes;
        }
    }

    public function ListePriveeById(int $id) : ?Liste{
        $req="SELECT * FROM Liste WHERE id = :id AND userid = :idUser";
        $this->co->executeQuery($req,array(':id' => array($id,PDO::PARAM_INT),
                                            ':idUser' => array($_SESSION['idUtilisateur'],PDO::PARAM_INT)));
        $listes=$this->co->getResults();
        foreach($listes as $row){
            $Tache=$this->tacheGateway->getTachesByIdListe($row['id']);
            $liste=new Liste($row['id'],$row['nom'],$row['userid'],$row['isprivate'],$Tache);
        }

        if(empty($liste)){
            return null;
        }
        else {
            return $liste;
        }
    }

    public function ListePrive(int $id){
        $req="SELECT * FROM Liste WHERE isprivate=1 AND userid=:id";
        $this->co->executeQuery($req,array(':id' => array($id,PDO::PARAM_INT)));
        $listes=$this->co->getResults();
        foreach($listes as $row){
            $Listes[]=new Liste($row['id'],$row['nom'],$row['idUser'],$row['isPrivate'],$row['LesTaches']);
            foreach($Listes as $l){
                return $l === false ? null : $l;
            }
        } 
    }

    public function addListe(string $nom, int $idUser,bool $isPrivate){
        $req="INSERT INTO Liste (nom,userid,isprivate) VALUES(':nom',':userid',':isprivate')";
        $this->co->executeQuery($req,array(':nom' => array($nom,PDO::PARAM_STR),
                                            ':userid' => array($idUser,PDO::PARAM_INT),
                                            ':isprivate' => array($isPrivate,PDO::PARAM_BOOL)
                                            ));
    } 

    public function deleteListe(int $idListe): void{
        $req="DELETE FROM Liste WHERE id = :idListe";
        $this->co->executeQuery($req,array(':id' => array($idListe,PDO::PARAM_INT)));
    } 
} 

?>