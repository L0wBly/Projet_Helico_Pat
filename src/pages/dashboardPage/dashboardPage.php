<?php
require_once '../../controllers/fonctions.php';
session_start();
obligationConnexion();

$messageErreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue sur votre dashboard !</title>
</head>
<body class="bg-sky-100">
  <div class="w-[100%] flex flex-col items-center">
    <h1 class="text-[4rem] text-purple-500 pt-[1.5rem]">Bienvenue sur votre dashboard !</h1>

    <p class="text-purple-500">Vous êtes connecté en tant que : <span class="text-red-500"><?= $_SESSION["identifiant"] ?></span> </p>
    <div class="flex flex-col justify-center items-center">
      <div class="flex flex-col justify-center items-center w-[400px] h-[20vh] rounded-[15px] m-[2rem] pt-[4rem] pb-[1rem] justify-between shadow-lg shadow-cyan-500/50 bg-sky-200">
        <a href="<?= BASE_URL ?>pages/uploadPage/uploadPage.php" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1.5rem] px-5 py-2.5 text-center me-2 mb-2">Envoyer un fichier</a>
      </div>
       <div>
        <button id="changePseudoButton" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1rem] px-5 py-2.5 text-center me-2 mb-2">Changer de pseudo</button>

        <form id="changePseudoForm" method="POST" action="<?= BASE_URL ?>controllers/changePseudo.php" style="display: none;" class="flex flex-col items-center w-[400px] h-[35vh] rounded-[15px] m-[2rem] pt-[4rem] pb-[1rem] justify-between shadow-lg shadow-cyan-500/50 bg-sky-200">
          <div class="flex flex-col items-center gap-[1.5rem]">
            <div>
              <label for="newPseudo">Nouveau pseudo :</label>
              <input type="text" id="newPseudo" name="newPseudo" required class="rounded-[15px] pr-[5px] pl-[5px]">
            </div>
            <div>
              <label for="password">Mot de passe :</label>
              <input type="password" id="password" name="password" required class="rounded-[15px] pr-[5px] pl-[5px]">
            </div>
          </div>
          <div class="flex flex-col items-center m-[5rem]">
            <button type="submit" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1rem] px-5 py-2.5 text-center me-2 mb-2">Confirmer</button>
          </div>
          
        </form>


        <button id="changePasswordButton" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1rem] px-5 py-2.5 text-center me-2 mb-2">Changer de mot de passe</button>


        <form id="changePasswordForm" method="POST" action="<?= BASE_URL ?>controllers/changePassword.php" style="display: none;" class="flex flex-col justify-center items-center w-[400px] h-[35vh] rounded-[15px] m-[2rem] pt-[4rem] pb-[1rem] justify-between shadow-lg shadow-cyan-500/50 bg-sky-200">
          <div class="flex flex-col items-center gap-[1.5rem]">
            <div>
              <label for="currentPassword">Mot de passe actuel :</label>
              <input type="password" id="currentPassword" name="currentPassword" required class="rounded-[15px] pr-[5px] pl-[5px]">
            </div>
            <div>
              <label for="newPassword">Nouveau mot de passe :</label>
              <input type="password" id="newPassword" name="newPassword" required class="rounded-[15px] pr-[5px] pl-[5px]">
            </div>
            <div class="flex flex-col items-center">
              <label for="confirmPassword">Confirmer le nouveau mot de passe :</label>
              <input type="password" id="confirmPassword" name="confirmPassword" required class="rounded-[15px] pr-[5px] pl-[5px]">
            </div>
          </div>     
          <div class="flex flex-col items-center m-[2rem]">
            <button type="submit" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1rem] px-5 py-2.5 text-center me-2 mb-2">Confirmer</button>
          </div>      
        </form>
      </div>
      <a href="<?= BASE_URL ?>components/deconnexion/deconnexion.php" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1.5rem] px-5 py-2.5 mt-[5rem] text-center me-2 mb-2">Se déconnecter</a>
    </div>
  </div>
  <?php if (!empty($messageErreur)): ?>
        <p style="color: red;"><?= $messageErreur ?></p>
  <?php endif; ?>
  
  <script src="<?= BASE_URL ?>pages/dashboardPage/dashboard.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>