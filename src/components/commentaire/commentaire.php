<?php

require_once '../../components/upload/upload.php';
require_once '../../controllers/fonctions.php';

$commentsFile = '../../components/commentaire/comments.json';
$comments = [];

if(!empty($_POST)){
  extract($_POST);
  $valid = true;

  if(isset($_POST['poster'])){

    $commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
    $name_fichier = filter_input(INPUT_POST, 'fichier', FILTER_SANITIZE_STRING);


    if(empty($commentaire)){
      $valid = false;
      $err_commentaire = "Vous n'avez pas rempli votre commentaire";
    } elseif(strlen($commentaire) < 3){
      $valid = false;
      $err_commentaire = "Votre commentaire doit faire plus de 3 caractères";
    }

    if($valid){
      $date_creation = date('Y-m-d H:i:s');
      
      $comment = array(
        'commentaire' => $commentaire,
        'date_creation' => $date_creation,
        'id_utilisateur' => $_SESSION['identifiant'] ?? 'Anonyme',
        'name_fichier' => $name_fichier
      );

      // Lire les commentaires existants
      $comments = file_exists($commentsFile) ? json_decode(file_get_contents($commentsFile), true) : array();

      // Ajouter le nouveau commentaire
      $comments[] = $comment;

      // Enregistrer les commentaires dans le fichier JSON
      file_put_contents($commentsFile, json_encode($comments));

      header('Location: ../../pages/uploadPage/uploadPage.php');
      exit();
    }
  }
}
