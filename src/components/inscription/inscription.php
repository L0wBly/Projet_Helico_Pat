<?php
require_once '../../controllers/fonctions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    if ($pseudo && $password) {
        $filePath = UTILISATEURS_FILE_PATH;
        $utilisateurs = ["pseudo" => $pseudo, "password" => password_hash($password, PASSWORD_DEFAULT)];
        ajouterUtilisateur($utilisateurs);
        header('Location: ' . BASE_URL . 'pages/connexionPage/connexionPage.php');
        exit();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>