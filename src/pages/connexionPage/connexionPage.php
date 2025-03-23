<?php
require_once '../../controllers/fonctions.php';
require_once '../../components/connexion/connexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Connexion">
    </form>

    <a href="<?= BASE_URL ?>pages/homePage/homePage.php">Revenir à la Home Page</a>

    <?php if (!empty($erreurs)): ?>
        <ul>
            <?php foreach ($erreurs as $erreur): ?>
                <li><?= $erreur ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>