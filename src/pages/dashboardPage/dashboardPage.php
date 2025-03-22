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
<body>
  <h1>Bienvenue sur votre dashboard !</h1>

  <p>Vous êtes connecté en tant que <?= $_SESSION["identifiant"] ?></p>

  <a href="<?= BASE_URL ?>pages/uploadPage/uploadPage.php">Envoyer un fichier</a>
  <a href="<?= BASE_URL ?>components/deconnexion/deconnexion.php">Se déconnecter</a>

  <button id="changePseudoButton">Changer de pseudo</button>

  <form id="changePseudoForm" method="POST" action="<?= BASE_URL ?>controllers/changePseudo.php" style="display: none;">
      <label for="newPseudo">Nouveau pseudo :</label>
      <input type="text" id="newPseudo" name="newPseudo" required>
      <br>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
      <br>
      <button type="submit">Confirmer</button>
  </form>

  <button id="changePasswordButton">Changer de mot de passe</button>

  <form id="changePasswordForm" method="POST" action="<?= BASE_URL ?>controllers/changePassword.php" style="display: none;">
      <label for="currentPassword">Mot de passe actuel :</label>
      <input type="password" id="currentPassword" name="currentPassword" required>
      <br>
      <label for="newPassword">Nouveau mot de passe :</label>
      <input type="password" id="newPassword" name="newPassword" required>
      <br>
      <label for="confirmPassword">Confirmer le nouveau mot de passe :</label>
      <input type="password" id="confirmPassword" name="confirmPassword" required>
      <br>
      <button type="submit">Confirmer</button>
  </form>

  <a href="<?= BASE_URL ?>pages/partagepage/partagepage.php">Partager un fichier</a>

  <?php if (!empty($messageErreur)): ?>
        <p style="color: red;"><?= $messageErreur ?></p>
  <?php endif; ?>
  
  <script src="<?= BASE_URL ?>pages/dashboardPage/dashboard.js"></script>
</body>
</html>