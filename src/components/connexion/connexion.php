<?php
require_once '../../controllers/fonctions.php';

$erreurs = [];
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = filter_input(INPUT_POST, "pseudo");
    $motdepasse = filter_input(INPUT_POST, "password");

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
        $hash = $utilisateur["password"];
        if(!password_verify($motdepasse, $hash)) {
            $erreurs[] = "Le mot de passe est incorrect";
        }
    }

    if(empty($erreurs)) {
        session_start();
        $_SESSION["identifiant"] = $identifiant;
        header('Location: /projetphp/projet_helico_pat/src/pages/dashboardPage/dashboardPage.php');
        exit();
    }
} 

?>