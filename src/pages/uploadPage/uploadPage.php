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
<body class="bg-sky-100">
    <div class="w-[100%] flex flex-col items-center">
        <h1 class="text-[4rem] text-purple-500 pt-[1.5rem]">Envoyer un fichier</h1>
        <ul>
            <?php foreach ($erreurs as $erreur): ?>
                <li><?= $erreur ?></li>
            <?php endforeach; ?>
        </ul>

        <form action="uploadPage.php" method="post" enctype="multipart/form-data" class="flex flex-col justify-center items-center w-[400px] h-[35vh] rounded-[15px] m-[2rem] pt-[4rem] pb-[1rem] justify-between shadow-lg shadow-cyan-500/50 bg-sky-200">
            <label for="upload" class="text-[1.5rem]">Déposer votre fichier</label>
            <input type="file" name="upload" id="upload" required class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1rem] px-5 py-2 text-center me-2 mb-2">
            <br>
            <button type="submit" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1rem] px-5 py-2.5 text-center me-2 mb-2">Envoyer</button>
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

        <a href="<?= BASE_URL ?>pages/dashboardPage/dashboardPage.php" class="text-[1.5rem] underline decoration-solid text-purple-500 pt-[1.5rem]">Retourner au dashboard</a>
    </div>
    <div class="w-[100%] flex flex-col items-center">
        <h2 class="text-[4rem] text-purple-500 pt-[3rem]">Vos fichiers</h2>

        <?php foreach ($fichiers as $fichier): ?>
            <form action="../../components/download/download.php" method="GET" class="bg-sky-500 flex items-center gap-[10px] rounded-[15px] px-5 py-2.5">
                <label for="file"><?= $fichier ?></label>
                <input type="hidden" name="file" value="<?= $fichier ?>">
                <div class="flex justify-center">
                    <button type="submit" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1rem] px-3 py-1.5 text-center ">Télécharger</button>
                </div>
            </form>
            <form action="../../components/suppression/suppression.php" method="POST">
                <input type="hidden" name="fichieraSupprimer" value="<?= $fichier ?>">
                <button type="submit">Supprimer</button>
            </form>
            <ul>
                <li>
                    <form method="POST" class="flex flex-col justify-center items-center w-[400px] h-[35vh] rounded-[15px] m-[2rem] pt-[4rem] pb-[1rem] justify-between shadow-lg shadow-cyan-500/50 bg-sky-200">
                        <input type="hidden" name="fichier_public" value="<?= $fichier ?>">
                        <select name="access">
                            <option value="">Choisir</option>
                            <option value="public">Rendre Public</option>
                            <option value="private">Rendre Privé</option>
                            <option value="reserved">Ajouter un destinataire</option>
                        </select>
                        <div class="flex flex-col gap-[0.2rem]">
                            <label for="">Ajouter un destinataire :</label>
                            <input type="text" name="destinataire" placeholder="Destinataire">
                        </div>
                        <button type="submit" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1rem] px-5 py-2.5 text-center me-2 mb-2">Confirmer</button>
                    </form>
                </li>
            </ul>
                <form method="POST" class="flex flex-col justify-center items-center w-[400px] h-[35vh] rounded-[15px] m-[2rem] pt-[4rem] pb-[1rem] justify-between shadow-lg shadow-cyan-500/50 bg-sky-200">
                    <div>
                        <?php if (isset($err_commentaire)): ?>
                            <div><?= $err_commentaire ?></div>
                        <?php endif; ?>
                        <div class="flex flex-col">
                            <label for="commentaire">Commenter :</label>
                            <textarea name="commentaire" type="text" placeholder="Votre commentaire"></textarea>
                            <input type="hidden" name="fichier" value="<?= $fichier ?>">
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="poster" class="w-fit text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-[1rem] px-5 py-2.5 text-center me-2 mb-2">Envoyer</button>
                    </div>
                </form> 
                <?php foreach ($comments as $comment): ?>
                <?php if ($comment['name_fichier'] == $fichier): ?>
                    <div class="flex flex-col justify-center items-center w-[400px] h-[35vh] rounded-[15px] m-[2rem] pt-[1rem] pb-[1rem] justify-evenly shadow-lg shadow-cyan-500/50 bg-sky-200">
                        <p><?= $comment['commentaire'] ?></p>
                        <p><?= $comment['date_creation'] ?></p>
                        <p><?= $comment['id_utilisateur'] ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>