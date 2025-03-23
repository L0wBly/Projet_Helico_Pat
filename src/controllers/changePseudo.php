<?php
require_once '../controllers/fonctions.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPseudo = $_POST["newPseudo"];
    $motDePasse = $_POST["password"];
    $resultat = modifierPseudo($newPseudo, $motDePasse);

    if ($resultat === "Pseudo modifié avec succès.") {
        header('Location: ' . BASE_URL . 'pages/dashboardPage/dashboardPage.php');
        exit();
    } else {
        header('Location: ' . BASE_URL . 'pages/dashboardPage/dashboardPage.php?erreur=' . urlencode($resultat));
        exit();
    }
}

function modifierPseudo($pseudo, $motDePasse) {
    $utilisateurs = recupererLesUtilisateurs();
    foreach ($utilisateurs as &$utilisateur) {
        if ($utilisateur["pseudo"] == $_SESSION["identifiant"]) {
            if (!password_verify($motDePasse, $utilisateur["password"])) {
                return "Mot de passe incorrect.";
            }

            $utilisateur["pseudo"] = $pseudo;
            $_SESSION["identifiant"] = $pseudo;
            sauvegarderLesUtilisateurs($utilisateurs);
            return "Pseudo modifié avec succès.";
        }
    }
    return "Utilisateur introuvable.";
}