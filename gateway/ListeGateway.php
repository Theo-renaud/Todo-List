<?php

class ListeGateway
{
    private Connection $co;

    public function __construct()
    {
        $dsn = 'mysql:host=londres;dbname=dbthrenaud1';
        $user = 'threnaud1';
        $pass = 'achanger';

        $this->co = new Connection($dsn,$user,$pass);
    }

    public function ListePublic(){
        $req="SELECT * FROM Liste WHERE isprivate=0";
        $this->co->executeQuery($req,array());
        $listes=$this->co->getResults();
        foreach($listes as $row){
            $Tache[]=getTachesByIdListes($row['id']);
            $Listes[]=new Liste($row['id'],$row['nom'],$row['idUser'],$row['isPrivate'],$row['LesTaches']);
            foreach($Listes as $l){
                return $l === false ? null : $l;
            }
        }
    }
} 

?>