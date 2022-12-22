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

    public function ListePublic() : ?array{
        $req="SELECT * FROM Liste WHERE isprivate=0";
        $this->co->executeQuery($req,array());
        $listes=$this->co->getResults();
        foreach($listes as $row){
            $Tache=$this->tacheGateway->getTachesByIdListe($row['id']);
            $Listes[]=new Liste($row['id'],$row['nom'],$row['userid'],$row['isprivate'],$Tache);
        }
        return $Listes;
    }
} 

?>