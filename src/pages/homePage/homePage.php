<?php
require_once '../../controllers/fonctions.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur notre site</h1>
    <p>Veuillez vous inscrire ou vous connecter pour continuer.</p>
    <a href="<?= BASE_URL ?>pages/inscriptionPage/inscriptionPage.php">S'inscrire</a>
    <a href="<?= BASE_URL ?>pages/connexionPage/connexionPage.php">Se connecter</a>
</body>
</html>
