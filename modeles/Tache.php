<<<<<<< HEAD
<?php

class Tache
{
    private int $id;
    private string $nom;
    private string $description;
    private int $idListe;

    function __construct(int $id, string $nom, string $description, int $idListe)
    {   
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->idListe = $idListe;
    }

    public function setIdListe(int $idListe): void {
        $this->idListe = $idListe;
    }

    public function getIdListe(): int {
        return $this->idListe;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getDescription(): string {
        return $this->description;
    }
}
?>