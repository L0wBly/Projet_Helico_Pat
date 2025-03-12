<?php

function estCeQueLadresseExisteDeja($adresse) {
    $utilisateurs = recupererLesUtilisateurs();

    foreach($utilisateurs as $utilisateur) {
        if($utilisateur["login"] == $adresse) {
            return true;
        }
    }
    return false;
}

function recupererLesUtilisateurs() {
    if(!file_exists("utilisateurs.json")) {
        file_put_contents("utilisateurs.json", "[]");
    }

    $utilisateursTxt = file_get_contents("utilisateurs.json");
    $utilisateurs = json_decode($utilisateursTxt, true);
    return $utilisateurs;
}

function sauvegarderLesUtilisateurs($utilisateurs) {
    $utilisateursTxt = json_encode($utilisateurs);
    file_put_contents("utilisateurs.json", $utilisateursTxt);
}

function recupererUtilisateurParAdresse($adresse) {
    $utilisateurs = recupererLesUtilisateurs();
    foreach($utilisateurs as $utilisateur) {
        if($utilisateur["login"] == $adresse) {
            return $utilisateur;
        }
    }
    return null;
}

function ajouterUtilisateur($utilisateur) {
    $utilisateurs = recupererLesUtilisateurs();
    $utilisateurs[] = $utilisateur;
    sauvegarderLesUtilisateurs($utilisateurs);
}

function obligationConnexion() {
    if(!estConnecte()) {
        header('Location: connexion.php');
        exit();
    }
}

function estConnecte() {
    if(isset($_SESSION["identifiant"])) {
        return true;
    }
    return false;
}