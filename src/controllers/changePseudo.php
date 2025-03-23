<?php
require_once '../controllers/fonctions.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPseudo = filter_input(INPUT_POST, "newPseudo", FILTER_VALIDATE_EMAIL);
    $motDePasse = $_POST["password"];
    $resultat = modifierPseudo($newPseudo, $motDePasse);

    if ($resultat === "Pseudo modifié avec succès.") {
        header('Location: ' . BASE_URL . 'pages/dashboardPage/dashboardPage.php');
        exit();
    } else if ($resultat === "Mot de passe incorrect.") {
        $_SESSION["messageErreur"] = "Mot de passe incorrect.";
        header('Location: ' . BASE_URL . 'pages/dashboardPage/dashboardPage.php');
        exit();
    } else if ($resultat === "Veuillez entrer un mail valide.") {
        $_SESSION["messageErreur"] = "Veuillez entrer un mail valide.";
        header('Location: ' . BASE_URL . 'pages/dashboardPage/dashboardPage.php');
        exit();
    }
}
function modifierPseudo($pseudo, $motDePasse) {
    $utilisateurs = recupererLesUtilisateurs();
    foreach ($utilisateurs as &$utilisateur) {
        if ($utilisateur["pseudo"] == $_SESSION["identifiant"]) {
            if (!password_verify($motDePasse, $utilisateur["password"])) {
                return "Mot de passe incorrect.";
            } else if (!filter_var($pseudo, FILTER_VALIDATE_EMAIL)) {
                return "Veuillez entrer un mail valide.";
            }

            $utilisateur["pseudo"] = $pseudo;
            $_SESSION["identifiant"] = $pseudo;
            sauvegarderLesUtilisateurs($utilisateurs);
            return "Pseudo modifié avec succès.";
        }
    }
}