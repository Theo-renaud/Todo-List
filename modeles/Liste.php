<?php

class Liste {
    private int $id;
    private string $nom;
    private int $idUser;
    private int $isPrivate;
    private array $lesTaches;

    function __construct(int $id, string $nom, int $idUser, int $isPrivate,array $lesTaches)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->idUser = $idUser;
        $this->isPrivate = $isPrivate;
        $this->lesTaches= $lesTaches;
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

    public function getLesTaches(): array {
        return $this->lesTaches;
    }
}

?>