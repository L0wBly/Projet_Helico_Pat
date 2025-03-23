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
        <h1 class="text-[4rem] text-purple-500 pt-[1.5rem]">Bienvenue sur notre site</h1>
        <div class="w-[100%] h-[85vh] flex justify-center items-center">
            <div class="w-[500px] h-[60vh] flex flex-col justify-around gap-[10px] items-center gap-[10px] pt-[3rem] p-[10px] rounded-[15px] shadow-lg shadow-cyan-500/50 bg-sky-200">
                <div class="w-[100%] flex flex-col items-center justify-center gap-[3rem]">
                    <a href="<?= BASE_URL ?>pages/inscriptionPage/inscriptionPage.php" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1.5rem] px-5 py-2.5 text-center me-2 mb-2" >S'inscrire</a>
                    <a href="<?= BASE_URL ?>pages/connexionPage/connexionPage.php" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1.5rem] px-5 py-2.5 text-center me-2 mb-2">Se connecter</a>
                </div>
                <p class="text-purple-500">Veuillez vous inscrire ou vous connecter pour continuer.</p>
            </div>
        </div>
        <script src="https://cdn.tailwindcss.com"></script>
    </div>
</body>
</html>
