<?php

class Liste {
    private int $id;
    private string $nom;
    private int $idUtilisateur;
    private bool $isPrivate;
    private Tache $lesTaches;
    

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setIdUtilisateur(int $idUtilisateur): void {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getIdUtilisateur(): int {
        return $this->idUtilisateur;
    }

    public function setIsPrivate(bool $isPrivate): void {
        $this->isPrivate = $isPrivate;
    }

    public function getIsPrivate(): bool {
        return $this->isPrivate;
    }
}

?>