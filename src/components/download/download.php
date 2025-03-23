<?php 
session_start();
require_once '../../controllers/fonctions.php';
require_once '../../components/partage/partage.php';
obligationConnexion();

$identifiantHasher = hashIdentifiant();

if (isset($_GET['file'])) {
    $file = basename($_GET['file']); // Sécurisation du nom de fichier
    $filepath = '';
    
    if (isset($_GET['public'])) {
        $filepath = '../../uploads/public/' . $file;
    } else if (isset($_GET['reserved'])) {
        $reserved_data = file_get_contents('../../components/reservedFile/reservedFiles.json');
        $data_json = json_decode($reserved_data, true);
        foreach ($data_json as $key => $value) {
            if ($value['lien'] == BASE_URL . 'components/download/download.php?file=' . urlencode($file) . '&reserved') {
                if ($value['destinataire'] == $_SESSION['identifiant']) {
                    $filepath = '../../uploads/reserved/' . $file;
                }
            }
        }
    } else {
        $filepath = '../../uploads/' . $identifiantHasher . '/' . $file;
    }

    if (file_exists($filepath)) {
        // En-têtes pour forcer le téléchargement
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        ob_clean();
        flush();
        readfile($filepath);
        exit;
    } else {
        echo "Le fichier n'existe pas.";
    }
} else {
    echo "Aucun fichier spécifié.";
}
?>