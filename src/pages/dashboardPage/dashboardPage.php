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

  <a href="/projetphp/projet_helico_pat/src/components/deconnexion/deconnexion.php">Se déconnecter</a>

    <button id="changePseudoButton">Changer de pseudo</button>
  
  <form id="changePseudoForm" method="POST" action="/projetphp/projet_helico_pat/src/controllers/changePseudo.php" style="display: none;">
      <label for="newPseudo">Nouveau pseudo :</label>
      <input type="text" id="newPseudo" name="newPseudo" required>
      <br>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
      <br>
      <button type="submit">Confirmer</button>
  </form>

  <?php if (!empty($messageErreur)): ?>
        <p style="color: red;"><?= ($messageErreur) ?></p>
  <?php endif; ?>

  
  <script src="/projetphp/projet_helico_pat/src/pages/dashboardPage/dashboard.js"></script>

</body>
</html>