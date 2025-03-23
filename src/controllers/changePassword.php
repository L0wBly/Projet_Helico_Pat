<?php
require_once '../controllers/fonctions.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($newPassword !== $confirmPassword) {
        header('Location: ' . BASE_URL . 'pages/dashboardPage/dashboardPage.php?erreur=Les mots de passe ne correspondent pas.');
        exit();
    }

    $utilisateurs = recupererLesUtilisateurs();
    foreach ($utilisateurs as &$utilisateur) {
        if ($utilisateur["pseudo"] == $_SESSION["identifiant"]) {
            if (!password_verify($currentPassword, $utilisateur["password"])) {
                header('Location: ' . BASE_URL . 'pages/dashboardPage/dashboardPage.php?erreur=Mot de passe actuel incorrect.');
                exit();
            }

            $utilisateur["password"] = password_hash($newPassword, PASSWORD_DEFAULT);
            sauvegarderLesUtilisateurs($utilisateurs);
            header('Location: ' . BASE_URL . 'pages/dashboardPage/dashboardPage.php?erreur=Mot de passe modifié avec succès.');
            exit();
        }
    }

    header('Location: ' . BASE_URL . 'pages/dashboardPage/dashboardPage.php?erreur=Utilisateur introuvable.');
    exit();
}
?>