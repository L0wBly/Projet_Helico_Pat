<?php

define('BASE_URL', rtrim($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', realpath(__DIR__ . '/..'))), '/') . '/');
define('UTILISATEURS_FILE_PATH', __DIR__ . '/../users/utilisateurs.json');

var_dump(BASE_URL);

function estCeQueLadresseExisteDeja($adresse) {
    $utilisateurs = recupererLesUtilisateurs();

    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur["login"] == $adresse) {
            return true;
        }
    }
    return false;
}

function recupererLesUtilisateurs() {
    $filePath = UTILISATEURS_FILE_PATH;
    $directory = dirname($filePath);

    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }

    if (!file_exists($filePath)) {
        if (file_put_contents($filePath, "[]") === false) {
            die("Erreur : Impossible de créer le fichier $filePath");
        }
    }

    $utilisateursTxt = file_get_contents($filePath);
    $utilisateurs = json_decode($utilisateursTxt, true);

    if (!is_array($utilisateurs)) {
        $utilisateurs = [];
    }

    return $utilisateurs;
}

function sauvegarderLesUtilisateurs($utilisateurs) {
    $filePath = UTILISATEURS_FILE_PATH;
    $utilisateursTxt = json_encode($utilisateurs, JSON_PRETTY_PRINT);
    if (file_put_contents($filePath, $utilisateursTxt) === false) {
        die("Erreur : Impossible de sauvegarder les utilisateurs dans $filePath");
    }
}

function recupererUtilisateurParAdresse($adresse) {
    $utilisateurs = recupererLesUtilisateurs();
    foreach($utilisateurs as $utilisateur) {
        if($utilisateur["pseudo"] == $adresse) {
            return $utilisateur;
        }
    }
        return null;
    }


function ajouterUtilisateur($utilisateur) {
    $utilisateurs = recupererLesUtilisateurs();
    $utilisateurs[] = $utilisateur;
    sauvegarderLesUtilisateurs($utilisateurs);
}

function obligationConnexion() {
    if(!estConnecte()) {
        header('Location: ' . BASE_URL . 'pages/homePage/homePage.php');
        exit();
    }
}

function estConnecte() {
    if(isset($_SESSION["identifiant"])) {
        return true;
    }
    return false;
}

function recupererLesFichier($identifiantHasher){
    $resultat = [];
    if(is_dir("../../uploads/$identifiantHasher/")){
        $fichiers = scandir("../../uploads/$identifiantHasher");
        foreach($fichiers as $fichier){
            if($fichier != "." && $fichier != ".."){
                $resultat[] = $fichier;
            }
        }
    }
    return $resultat;
}

function hashIdentifiant(){
    $identifiantHasher = hash('crc32',$_SESSION['identifiant']);
    return $identifiantHasher;
}

function recupererLesCommentaires(){
    $commentsFile = '../../components/commentaire/comments.json';
    $comments = [];
    if(file_exists($commentsFile)){
        $comments = json_decode(file_get_contents($commentsFile), true);
    }
    return $comments;
}