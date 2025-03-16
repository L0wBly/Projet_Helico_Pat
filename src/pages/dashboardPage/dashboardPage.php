<?php
require_once '../../controllers/fonctions.php';
session_start();
obligationConnexion();
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
</body>
</html>