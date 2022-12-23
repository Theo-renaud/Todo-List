<?php

class Validation {

    static function validationConnexion(string &$nom, string &$mdp) {

        if (empty($nom)) {
            $dVueEreur[] = "Vous devez saisir un nom d'utilisateur";
        }

        if (empty($mdp)) {
            $dVueEreur[] = "Vous devez saisir un mot de passe";
        }

        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nom)) {
            $dVueEreur[] = "Le nom d'utilisateur ne doit pas contenir de caractères spéciaux";
        }

        if (!empty($dVueEreur)) {
            require __DIR__ . '/../vues/Erreur.php';
            exit(0);
        }

        $nom = htmlspecialchars($nom);
    }

    static function validationListe(string &$nom) {

        if (empty($nom)) {
            $dVueEreur[] = "Vous devez saisir un nom de liste";
        }

        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nom)) {
            $dVueEreur[] = "Le nom de la liste ne doit pas contenir de caractères spéciaux";
        }

        if (!empty($dVueEreur)) {
            require __DIR__ . '/../vues/Erreur.php';
            exit(0);
        }

        $nom = htmlspecialchars($nom);
    }
}
?>

        