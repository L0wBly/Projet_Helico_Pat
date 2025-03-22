<?php 
session_start();
require_once '../../components/partage/partage.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partage de fichier</title>
</head>
<body>
    <ul>
    <?php foreach ($fichiers as $fichier): ?>
        <li>
            <a href="../../uploads/<?= $identifiantHasher ?>/<?= $fichier ?>"><?= $fichier ?></a>
            <form method="POST">
                <input type="hidden" name="fichier_public" value="<?= $fichier ?>">
                <select name="public">
                    <option value="public">Rendre Public</option>
                    <option value="private">Rendre Privé</option>
                </select>
                <button type="submit">Confirmer</button>
            </form>
        </li>
        <?php if($publiclink != ''): ?>
            <a href="<?= $publiclink ?>">Lien public</a>
        <?php endif; ?>
    <?php endforeach; ?>
    </ul>
</body>
</html>