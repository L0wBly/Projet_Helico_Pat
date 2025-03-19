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
<body class="bg-sky-100">
    <div class="flex flex-col items-center">
        <h1 class="text-[4rem]">Bienvenue sur notre site</h1>
        <div class="pt-[1rem] p-[10px] border-2 border-solid flex flex-col gap-[10px]">
            <p class="text-red-500">Veuillez vous inscrire ou vous connecter pour continuer.</p>
            <div class="flex justify-center gap-[1rem]">
                <a href="<?= BASE_URL ?>pages/inscriptionPage/inscriptionPage.php" class="bg-gray-300" >S'inscrire</a>
                <a href="<?= BASE_URL ?>pages/connexionPage/connexionPage.php">Se connecter</a>
            </div>
        </div>
        <script src="https://cdn.tailwindcss.com"></script>
    </div>
</body>
</html>
