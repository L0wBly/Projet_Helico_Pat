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
    $directory = "../inscriptionPage/";
    $filePath = $directory . "utilisateurs.json";

    if (!file_exists($filePath)) {
        file_put_contents($filePath, "[]");
    }

    $utilisateursTxt = file_get_contents($filePath);
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
        if($utilisateur["pseudo"] == $adresse) {
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
        header('Location: /projetphp/projet_helico_pat/src/pages/homePage/homePage.php');
        exit();
    }
}

function estConnecte() {
    if(isset($_SESSION["identifiant"])) {
        return true;
    }
    return false;
}