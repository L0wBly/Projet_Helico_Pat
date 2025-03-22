<?php
require_once '../../controllers/fonctions.php';
obligationConnexion();

$identifiantHasher = hashIdentifiant();
$publiclink = '';
$fichiers = recupererLesFichier($identifiantHasher); // $resultat = [$fichier1, $fichier2, ...]

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fichier = basename($_POST['fichier_public']);
    $privatepath = '../../uploads/' . $identifiantHasher . '/' . $fichier;
    $publicpath = '../../uploads/public/' . $fichier;
    if(file_exists($privatepath)){
        if($_POST['public'] === 'public'){
            if(!is_dir('../../uploads/public')){
                mkdir('../../uploads/public');
            }
            copy($privatepath, $publicpath);
            $publiclink = BASE_URL . 'components/download/download.php?file=' . urlencode($fichier) . '&public';
            var_dump($publiclink);
        }
    }
}
?>