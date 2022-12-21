<?php

class Validation {

    // static function val_action($action) {

    //     if (!isset($action)) {
    //         throw new Exception('pas d\'action');
    //         //on pourrait aussi utiliser
    //         //$action = $_GET['action'] ?? 'no';
    //         // This is equivalent to:
    //         //$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';
    //     }
    // }

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
            require __DIR__ . '/../vues/erreur.php';
            exit(0);
        }

        $nom = htmlspecialchars($nom);
    }
}
?>

        