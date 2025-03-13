<?php 

    require_once 'fonctions.php';

    if(isset($_SESSION["identifiant"])) {
        header('Location: dashboard.php');
        exit();
    }
    $identifiant = $_SESSION['identifiant'];
    $identifiantHasher = hash('crc32',$identifiant);
    $erreurs = [];
    $messageEnvoi = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $targetDir = "uploads/$identifiantHasher";
        $targetFile = $targetDir . basename($_FILES["upload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        // On vérifi si le fichier existe déja
        if (file_exists($targetFile)) {
            $erreurs[] =  "Ce fichier existe déja";
            $uploadOk = 0;
        }
        
        // test de création de dossier
        // if(is_dir($targetDir)){
        //     mkdir($targetDir);
        // }
        
        if ($_FILES["upload"]["size"] > 20000000) {
            $erreurs[] = "Votre fichier doit être inférieur à 20Mo";
            $uploadOk = 0;
        }
    
        // les fichier que l'on accepte
        // if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" ) {
        //     $erreurs[] =  "Seul les fichiers .jpg, .png et .jpeg sont accepté";
        //     $uploadOk = 0;
        // }

        // Les type de fichier que l'on ne veut pas accepter
        if($fileType == "php"){
            $erreurs[] = "Vous ne pouvez pas envoyer un fichier .php";
            $uploadOk = 0;
        }
    
        // Envoi du fichier
        if ($uploadOk == 0) {
            $erreurs[] =  "Votre fichier n'a pas été envoyé";
        } else {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFile)) {
                $messageEnvoi =  "Votre fichier ". htmlspecialchars(basename($_FILES["upload"]["name"])). " a été envoyé";
            } else {
                $erreurs[] = "Il y a eu une erreur lors de l'envoi";
            }
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
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
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="upload">Déposer votre fichier</label>
        <input type="file" name="upload" id="upload" required>
        <br>
        <button type="submit">Envoyer</button>
    </form>
    <?php if($messageEnvoi != ''): ?>
        <p><?= $messageEnvoi ?></p>
    <?php endif; ?> 
</body>
</html>