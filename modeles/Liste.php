<?php

class Liste {
    private string $nom;
    private Tache $lesTaches;

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getNom(): string {
        return $this->nom;
    }


}

?>