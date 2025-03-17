<?php 

require_once '../../controllers/fonctions.php';

    
    $identifiant = $_SESSION['identifiant'];
    $identifiantHasher = hash('crc32',$identifiant);
    $erreurs = [];
    $messageEnvoi = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $targetDir = "../../uploads/$identifiantHasher/";
        $targetFile = $targetDir . basename($_FILES["upload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        // On vérifi si le fichier existe déja
        if (file_exists($targetFile)) {
            $erreurs[] =  "Ce fichier existe déja";
            $uploadOk = 0;
        }
        
        // test de création de dossier
        if(!is_dir($targetDir)){
            mkdir("$targetDir",0777,true);
        }
        
        if ($_FILES["upload"]["size"] > 20000000) {
            $erreurs[] = "Votre fichier doit être inférieur à 20Mo";
            $uploadOk = 0;
        }

        // Les types de fichier que l'on ne veut pas accepter
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
