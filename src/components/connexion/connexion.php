<?php
require_once 'fonctions.php';

if(isset($_SESSION["identifiant"])) {
    header('Location: dashboard.php');
    exit();
}

$erreurs = [];
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = filter_input(INPUT_POST, "identifiant");
    $motdepasse = filter_input(INPUT_POST, "motdepasse");

    if(!$identifiant) {
        $erreurs[] = "L'identifiant est obligatoire";
    }
    if(!$motdepasse) {
        $erreurs[] = "Le mot de passe est obligatoire";
    }
    
    $utilisateur = recupererUtilisateurParAdresse($identifiant);
    if(!$utilisateur) {
        $erreurs[] = "Le compte n'existe pas";
    } else {    
        $hash = $utilisateur["pwd"];
        if(!password_verify($motdepasse, $hash)) {
            $erreurs[] = "Le mot de passe est incorrect";
        }
    }

    if(empty($erreurs)) {
        $_SESSION["identifiant"] = $identifiant;
        header('Location: dashboard.php');
        exit();
    }
} ?>