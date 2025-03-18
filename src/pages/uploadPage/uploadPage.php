<?php 
session_start();
require_once '../../components/upload/upload.php';
obligationConnexion();

$fichiers = recupererLesFichier($identifiantHasher)

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Envoie de fichier</title>
</head>
<body>
    <h1>Envoyer un fichier</h1>
    <ul>
        <?php foreach($erreurs as $erreur): ?>
            <li> <?= $erreur ?></li>
        <?php endforeach; ?>
    </ul>

    <form action="uploadPage.php" method="post" enctype="multipart/form-data">
        <label for="upload">Déposer votre fichier</label>
        <input type="file" name="upload" id="upload" required>
        <br>
        <button type="submit">Envoyer</button>
    </form>

    <?php if($messageEnvoi != ''): ?>
        <p><?= $messageEnvoi ?></p>
    <?php endif; ?> 

    <a href="<?= BASE_URL ?>pages/dashboardPage/dashboardPage.php">Retourner au dashboard</a>

    <h2>Vos fichiers</h2>

    <?php foreach($fichiers as $fichier): ?>
        <form action="../../components/download/download.php" method="GET">
            <label for="file"><?= $fichier ?></label>
            <input type="hidden" name="file" value="<?= $fichier ?>">
            <button type="submit">Télécharger</button>
        </form>
    <?php endforeach; ?>

</body>
</html>