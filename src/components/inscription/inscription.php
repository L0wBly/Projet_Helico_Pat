<?php
require_once '../../controllers/fonctions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

  if ($pseudo && $password) {
      $filePath = UTILISATEURS_FILE_PATH;
      $user = ["pseudo" => $pseudo, "password" => password_hash($password, PASSWORD_DEFAULT)];
      $users = json_decode(file_get_contents($filePath), true) ?? [];
      $users[] = $user;
      file_put_contents($filePath, json_encode($users));
      header("Location: /projetphp/projet_helico_pat/src/pages/connexionPage/connexionPage.php");
      exit();
  } else {
      echo "Veuillez remplir tous les champs.";
  }
}
?>
 