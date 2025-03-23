<?php
session_start();
require_once '../../controllers/fonctions.php';
obligationConnexion();
$identifiantHasher = hashIdentifiant();



if (isset($_POST['fichieraSupprimer'])) {
    $fichier = basename($_POST['fichieraSupprimer']);
    $uploadDir = '../../uploads/' . $identifiantHasher . '/';
    $filePath = $uploadDir . $fichier;
    $publicpath = '../../uploads/public/' . $fichier;
    $reservedpath = '../../uploads/reserved/' . $fichier;

    if (file_exists($filePath)) {
            unlink($filePath);
            $_SESSION['messageSuppression']= "✅ Le fichier a bien été supprimé.<br>";
            if (file_exists($publicpath)) {
                unlink($publicpath);
            }
            if (file_exists($reservedpath)) {
                unlink($reservedpath);
            }
            header('Location: ' . BASE_URL . 'pages/uploadpage/uploadpage.php');
        }
    } else {
        $_SESSION['messageSuppression']= "❌ Le fichier n'existe pas.<br>";
}
?>