<?php
require_once '../../components/inscription/inscription.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body class="bg-sky-100">
    <div class="w-[100%] flex flex-col items-center">
        <h1 class="text-[4rem] text-purple-500 pt-[1.5rem]">Inscription</h1>
        <form method="POST" class="flex flex-col justify-center items-center w-[400px] h-[35vh] rounded-[15px] m-[2rem] pt-[4rem] pb-[1rem] justify-between shadow-lg shadow-cyan-500/50 bg-sky-200">
            <div class="flex flex-col gap-[1.5rem]">
                <div>
                    <label for="pseudo">Pseudo</label>
                    <input type="mail" name="pseudo" id="pseudo" required class="rounded-[15px] pr-[5px] pl-[5px]">
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required class="rounded-[15px] pr-[5px] pl-[5px]">
                </div>
            </div>
                <input type="submit" value="Inscription" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1.5rem] px-5 py-2.5 text-center me-2 mb-2">
        </form>
        <a href="<?= BASE_URL ?>pages/homePage/homePage.php" class="text-[1.5rem] underline decoration-solid text-purple-500 pt-[1.5rem]">Revenir à la Home Page</a>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>