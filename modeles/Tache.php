<?php

class Tache
{
    private int $id;
    private string $nom;
    private string $description;
    private int $idListe;
    private bool $ischeck;

    function __construct(int $id, string $nom, string $description, int $idListe,bool $ischeck)
    {   
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->idListe = $idListe;
        $this->ischeck=$ischeck;
    }

    public function setIdListe(int $idListe): void {
        $this->idListe = $idListe;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getIdListe(): int {
        return $this->idListe;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getId(): int {
        return $this->id;
    }
}
?>