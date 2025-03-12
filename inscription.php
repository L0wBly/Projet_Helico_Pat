<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

  if ($pseudo && $password) {
      $user = ["pseudo" => $pseudo, "password" => password_hash($password, PASSWORD_DEFAULT)];
      $users = json_decode(file_get_contents("utilisateurs.json"), true) ?? [];
      $users[] = $user;
      file_put_contents("utilisateurs.json", json_encode($users));
      header("Location: connexion.php");
      exit;
  } else {
      echo "Veuillez remplir tous les champs.";
  }
}
?>