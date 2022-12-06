<?php

class Tache
{
    private string $nom;
    private string $description;
    private int $idListe;

    public function setIdListe(int $idListe): void {
        $this->idListe = $idListe;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getIdListe(): int {
        return $this->idListe;
    }
}

?>