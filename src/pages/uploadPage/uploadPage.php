<?php 
session_start();
require_once '../../components/upload/upload.php';
require_once '../../components/commentaire/commentaire.php';
require_once '../../components/partage/partage.php';
obligationConnexion();

$fichiers = recupererLesFichier($identifiantHasher);
$comments = recupererLesCommentaires();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoie de fichier</title>
</head>
<body>
    <h1>Envoyer un fichier</h1>
    <ul>
        <?php foreach ($erreurs as $erreur): ?>
            <li><?= $erreur ?></li>
        <?php endforeach; ?>
    </ul>

    <form action="uploadPage.php" method="post" enctype="multipart/form-data">
        <label for="upload">Déposer votre fichier</label>
        <input type="file" name="upload" id="upload" required>
        <br>
        <button type="submit">Envoyer</button>
    </form>

    <?php if ($sharedlink != '' && $public == 'public'): ?>
        <a href="<?= $sharedlink ?>">Lien public</a>
    <?php endif; ?>

    <?php if ($sharedlink != '' && $public == 'reserved'): ?>
        <a href="<?= $sharedlink ?>">Lien privé</a>
    <?php endif; ?>


    <?php if ($messageEnvoi != ''): ?>
        <p><?= $messageEnvoi ?></p>
    <?php endif; ?> 

    <a href="<?= BASE_URL ?>pages/dashboardPage/dashboardPage.php">Retourner au dashboard</a>

    <h2>Vos fichiers</h2>

    <?php foreach ($fichiers as $fichier): ?>
        <form action="../../components/download/download.php" method="GET">
            <label for="file"><?= $fichier ?></label>
            <input type="hidden" name="file" value="<?= $fichier ?>">
            <button type="submit">Télécharger</button>
        </form>
        <ul>
            <li>
                <form method="POST">
                    <input type="hidden" name="fichier_public" value="<?= $fichier ?>">
                    <select name="access">
                        <option value="">Choisir</option>
                        <option value="public">Rendre Public</option>
                        <option value="private">Rendre Privé</option>
                        <option value="reserved">Ajouter un destinataire</option>
                    </select>
                    <input type="text" name="destinataire" placeholder="Destinataire">
                    <button type="submit">Confirmer</button>
                </form>
            </li>
        </ul>
            <form method="POST">
                <div>
                    <?php if (isset($err_commentaire)): ?>
                        <div><?= $err_commentaire ?></div>
                    <?php endif; ?>
                    <label for="commentaire">Commenter :</label>
                    <textarea name="commentaire" type="text" placeholder="Votre commentaire"></textarea>
                    <input type="hidden" name="fichier" value="<?= $fichier ?>">
                </div>
                <div>
                    <button type="submit" name="poster">Envoyer</button>
                </div>
            </form> 
            <?php foreach ($comments as $comment): ?>
            <?php if ($comment['name_fichier'] == $fichier): ?>
                <div>
                    <p><?= $comment['commentaire'] ?></p>
                    <p><?= $comment['date_creation'] ?></p>
                    <p><?= $comment['id_utilisateur'] ?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</body>
</html>