<?php
require_once '../../controllers/fonctions.php';
obligationConnexion();

$identifiantHasher = hashIdentifiant();
$sharedlink = '';
$fichiers = recupererLesFichier($identifiantHasher);
$public = '';
$erreurshare = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fichier_public']) && isset($_POST['access'])) {
    $fichier = basename($_POST['fichier_public']);
    $privatepath = '../../uploads/' . $identifiantHasher . '/' . $fichier;
    $publicpath = '../../uploads/public/' . $fichier;
    $reservedpath = '../../uploads/reserved/' . $fichier;
    $public = $_POST['access'];

    if (file_exists($privatepath)) {
        if ($public === 'public') {
            if (!is_dir('../../uploads/public')) {
                mkdir('../../uploads/public');
            }
            copy($privatepath, $publicpath);
            $sharedlink = BASE_URL . 'components/download/download.php?file=' . urlencode($fichier) . '&public';
        } else if ($public === 'reserved') {
            if (!is_dir('../../uploads/reserved')) {
                mkdir('../../uploads/reserved');
            }
            copy($privatepath, $reservedpath);
            $destinataire = $_POST['destinataire'];
            $utilisateur = recupererUtilisateurParAdresse($destinataire);
            if ($utilisateur) {
                $sharedlink = BASE_URL . 'components/download/download.php?file=' . urlencode($fichier) . '&reserved';
                $reservedfile = array(
                    'destinataire' => $destinataire,
                    'lien' => $sharedlink  
                );
                $reservedFileDir = '../../components/reservedFile';
                if (!is_dir($reservedFileDir)) {
                    mkdir($reservedFileDir, 0777, true);
                }

                $reservedFiles = file_exists($reservedFileDir . '/reservedFiles.json') 
                    ? json_decode(file_get_contents($reservedFileDir . '/reservedFiles.json'), true) 
                    : array();

                $reservedFiles[] = $reservedfile;

                file_put_contents($reservedFileDir . '/reservedFiles.json', json_encode($reservedFiles));
            } else {
                $erreurshare = 'Utilisateur inexistant';
            }
        }
    }
}
?>
